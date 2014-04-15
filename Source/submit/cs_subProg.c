//Main file for submit program
#include "sub_header.h"

int main(int argc,char **argv)
{
	int result = 0;
	char subDetails[255];
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
	printf("Submission details:\n\n");
	printf("Pawprint: %s\nFile name: %s\nFile size: %d bytes\nCourse: %s\nSection: %s\n"
	"Assignment: %s\n",userName,filename,fSize,course,section,assign);
	
	sprintf(subDetails,"Pawprint: %s - File name: %s - File size: %d bytes - Course: %s - Section: %s - "
	"Assignment: %s",userName,filename,fSize,course,section,assign);
	makeLogEntry(subDetails);
	
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

