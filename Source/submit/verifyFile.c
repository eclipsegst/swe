//Support file for submit program performs file validation

#include <stdio.h>
#include <sys/stat.h>
#define MAX_FILE_SIZE 5242880	//5MB


//Perform validation on the file passed
off_t validateFilePassed(const char *filename)
{
	FILE *file;
	struct stat st;
	off_t fSize;
	//open file to see if it exists
	file = fopen(filename,"r");
	//NULL means file doesn't exist or not
	//sufficient privilege
	
	if(file == NULL)
	{
		printf("File %s doesn't exist\n",filename);
		return -1;
	}
	//File exists print success
	else
	{
		fclose(file);
	}
	
	//determine file size
	if (stat(filename,&st)==0)
	{
		fSize = st.st_size;
	}
	else
	{
		printf("Error encountered when determining file size\n");
		return -1;
	}
	//check if file size exceeds the limit
	if (fSize > MAX_FILE_SIZE)
	{
		printf("Error file size is over the specified cap \n");
		return -1;
	}
	return fSize;	
}
