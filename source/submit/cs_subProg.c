//Main file for submit program
#include "sub_header.h"

int main(int argc,char **argv)
{
	int result = 0;
	char subDetails[255];
	struct curl_httppost* post = NULL;
	struct curl_httppost* last = NULL;
	CURL *curl;
    CURLcode res;
	
	curl_global_init(CURL_GLOBAL_ALL);
	
	if(argc == 2)
	{
		int course_len = 0;
		course_len = strlen(argv[1]);
		course = (char *)malloc((sizeof(char))*course_len);
		
		//copy the strings into appropriate variables	
		strcpy(course,argv[1]);

		char *paw = getPawprint();
	
		readConfigFile(url,webname,urlAdd);

		curl_formadd(&post,&last,CURLFORM_COPYNAME,"user",CURLFORM_COPYCONTENTS,
						 paw,CURLFORM_END);
						 
		curl_formadd(&post,&last,CURLFORM_COPYNAME,"course",CURLFORM_COPYCONTENTS,
						 course,CURLFORM_END);
		
		curl_formadd(&post,&last,CURLFORM_COPYNAME,"submit",CURLFORM_COPYCONTENTS,
					 "submit",CURLFORM_END);					 
					 	
					 			 
		curl = curl_easy_init();
		if(curl)
		{
			//printf("hello");
			
		}
		else
		{
			printf("init prob\n");
			return -1;
		}
		
		curl_easy_setopt(curl,CURLOPT_URL,urlAdd);
		curl_easy_setopt(curl,CURLOPT_HTTPPOST,post);
		//curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writeFunc);
		//curl_easy_setopt(curl, CURLOPT_WRITEDATA, &s);
		res = curl_easy_perform(curl);
		if(res == CURLE_OK)
		{
			//everything is working
			return 0;			
		}
		else
		{
			printf("Error in tranmission\n");
			return -1;
		}
		
		
	}
	else if(argc != 4)
	{
		printf("Incorrect number of parameters.\n"
		"Correct usage is:\n"
		"./cs_subprog <course_section> <assignment> <filename>\n");
		return -1;
	}	

	course_section = (char *) malloc (sizeof(char)*(strlen(argv[1])+1));
	assign = (char *) malloc (sizeof(char)*(strlen(argv[2])+1));
	filename = (char *) malloc (sizeof(char)*(strlen(argv[3])+1));
	
	strcpy(course_section,argv[1]);
	strcpy(assign,argv[2]);
	strcpy(filename,argv[3]);
		
	result = validateParametersPassed();
	
	if(readConfigFile(url,webname,urlAdd) == -1)
	{
		printf("Exiting due to error.....\n");
		return -1;
	}
	
	//returnUrl(url);
	//returnWebName(webname);
	
	
	if(result == -1)
	{
		printf("Exiting due to error.....\n");
		return -1;
	}
	
	fSize = validateFilePassed(filename);
	
	if(fSize == -1)
	{
		printf("Exiting due to error.....\n");
		return -1;
	}
	getPawprint();
	//struct string s;
    //init_string(&s);
    
    GenerateHashCode();
    
	
	
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"userfile",CURLFORM_FILE,
					 filename,CURLFORM_END);
					 
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"course",CURLFORM_COPYCONTENTS,
					 course,CURLFORM_END);
	
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"section",CURLFORM_COPYCONTENTS,
					 section,CURLFORM_END);
					 
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"user",CURLFORM_COPYCONTENTS,
					userName,CURLFORM_END);
					
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"hash",CURLFORM_COPYCONTENTS,
					 md_value,CURLFORM_END);	
					 
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"assignment",CURLFORM_COPYCONTENTS,
					 assign,CURLFORM_END);						 				
					 
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"submit",CURLFORM_COPYCONTENTS,
					 "submit",CURLFORM_END);	
					 
					 	
					 			 
	curl = curl_easy_init();
	if(curl)
	{
		//printf("hello");
		
	}
	else
	{
		printf("init prob\n");
		return -1;
	}
	
	curl_easy_setopt(curl,CURLOPT_URL,url);
	curl_easy_setopt(curl,CURLOPT_HTTPPOST,post);
	//curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writeFunc);
    //curl_easy_setopt(curl, CURLOPT_WRITEDATA, &s);
	res = curl_easy_perform(curl);
	if(res == CURLE_OK)
	{
		double sizeUploaded = 0;		
		curl_easy_getinfo(curl,CURLINFO_SIZE_UPLOAD,&sizeUploaded);
		/*printf("File sending successfull\n\n");
		//printf("%s"s->ptr);
		printf("Submission details:\n\n");
		printf("Pawprint: %s\nFile name: %s\nFile size: %d bytes\nCourse: %s\nSection: %s\n"
				"Assignment: %s\n",userName,filename,fSize,course,section,assign);
	
		sprintf(subDetails,"Pawprint: %s - File name: %s - File size: %d bytes - Course: %s - Section: %s - "
		"Assignment: %s",userName,filename,fSize,course,section,assign);*/
		makeLogEntry(subDetails);
		
	}
	else
	{
		printf("Error in sending file\n");
	}
	
	
	curl_easy_cleanup(curl);
	return 0;
}

//Peform validation on parameters passed
int validateParametersPassed()
{
	char *delimiter;
	delimiter = strchr(course_section,'_');
	int pos=0;
	int sec_len=0;
	int course_len=0;
	
	//Check if <_> is present or not
	if(delimiter == NULL)
	{ 
		printf("The parameter <course_section> is missing and <_> character\n");
		return -1;
	}
	
	//determine where <_> occured to split course and section 	
	pos = delimiter-course_section+1;
	//determine the length of course and section strings and allocate memory	
	sec_len = strlen(course_section) - pos;
	course_len = pos-1;
	course = (char *)malloc((sizeof(char))*course_len);
	section = (char *)malloc((sizeof(char))*sec_len+1);
	//copy the strings into appropriate variables
	strcpy(section,&course_section[pos]);
	memcpy(course,course_section,course_len);	
}

//Perform clean up of allocated memory	
void cleanup()
{
	free(course_section);
	free(assign);
	free(filename);
	free(course);
	free(section);
}

//get pawprint by making system call
char* getPawprint()
{
	uid_t userID;
	userID = getuid();
	pwptr = getpwuid(userID);
	userName = pwptr->pw_name;
	return userName;

}

void init_string(struct string *s)
 {
	s->len = 0;
	s->ptr = malloc(s->len+1);
	if (s->ptr == NULL) 
	{
		fprintf(stderr, "malloc() failed\n");
		exit(EXIT_FAILURE);
	}
	s->ptr[0] = '\0';
}

size_t writeFunc(void *ptr, size_t size, size_t nmemb, struct string *s)
{
	size_t new_len = s->len + size*nmemb;
	s->ptr = realloc(s->ptr, new_len+1);
	if (s->ptr == NULL) 
	{
		fprintf(stderr, "realloc() failed\n");
		exit(EXIT_FAILURE);
	}
	memcpy(s->ptr+s->len, ptr, size*nmemb);
	s->ptr[new_len] = '\0';
	s->len = new_len;

	return size*nmemb;
}

void GenerateHashCode()
{
	EVP_MD_CTX *mdctx;
	const EVP_MD *md;
	
	int md_len, i;
	long lSize;
	unsigned char *buffer;
	
	FILE *file = fopen(filename,"r");

	fseek (file , 0 , SEEK_END);
	lSize = ftell (file);
	rewind (file);	
	
	buffer = (char *)malloc(sizeof(char)*lSize);
	fread(buffer,1,lSize,file);
	
	OpenSSL_add_all_digests();	

	md = EVP_sha256();

	if(!md) 
	{
			printf("Unknown message digest \n");
			exit(1);
	}

	mdctx = EVP_MD_CTX_create();
	EVP_DigestInit_ex(mdctx, md, NULL);
	EVP_DigestUpdate(mdctx, buffer, strlen(buffer));
	EVP_DigestFinal_ex(mdctx, md_value, &md_len);
	EVP_MD_CTX_destroy(mdctx);

	/*printf("Digest is: ");
	for(i = 0; i < md_len; i++) printf("%02x", md_value[i]);
	printf("\n");*/
}
