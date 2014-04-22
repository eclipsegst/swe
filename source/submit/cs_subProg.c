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
	
	
	if(argc != 4)
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
	
	if(readConfigFile(url,webname) == -1)
	{
		printf("Exiting due to error.....\n");
		return -1;
	}
	
	//returnUrl(url);
	//returnWebName(webname);
	
	printf("\nWeb service URL = %s\n",url);
	printf("Web username = %s\n\n",webname);
	
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
	struct string s;
    init_string(&s);
	curl_global_init(CURL_GLOBAL_ALL);
	
	curl_formadd(&post,&last,CURLFORM_COPYNAME,"file",CURLFORM_FILE,
					 filename,CURLFORM_END);
					 
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
	curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writeFunc);
    curl_easy_setopt(curl, CURLOPT_WRITEDATA, &s);
	res = curl_easy_perform(curl);
	if(res == CURLE_OK)
	{
		printf("File sending successfull\n\n");
		//printf("%s"s->ptr);
		printf("Submission details:\n\n");
		printf("Pawprint: %s\nFile name: %s\nFile size: %d bytes\nCourse: %s\nSection: %s\n"
				"Assignment: %s\n",userName,filename,fSize,course,section,assign);
	
		sprintf(subDetails,"Pawprint: %s - File name: %s - File size: %d bytes - Course: %s - Section: %s - "
		"Assignment: %s",userName,filename,fSize,course,section,assign);
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
