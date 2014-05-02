//Support file for submit program which reads the config file
#include <stdio.h>
#include <string.h>

#define confFileName "config"

FILE *fileConf;
char url[255];
char webname[100];
char urlA[255];

//Check if config file exists, 
int checkConf()
{
	//open file to see if it exists
	fileConf = fopen(confFileName,"r");
	//NULL means file doesn't exist or not
	//insufficient privilege
	
	getTime();
	if(fileConf == NULL)
	{
		printf("File %s doesn't exist\n",confFileName);
		makeLogEntry("File doesn't exist");
		return -1;
	}
	//File exists print success
	else
	{
		fclose(fileConf);
		return 0;
	} 
}
		

//Make an entry into the log filer
int readConfigFile(char *urlP,char *nameP,char *urlAP)
{
	char buffer[255];
	char temp[255];

	if(checkConf() == -1)
	{
		printf("Error: could not find configuration file !!\n");
		makeLogEntry("Error: could not find configuration file !!");
		return -1;
	}
	fileConf = fopen(confFileName,"r");
	fgets(buffer,255,fileConf);	
	sscanf(buffer,"%*s %s",url);	
	fgets(buffer,255,fileConf);
	sscanf(buffer,"%*s %s",urlA);
	fgets(buffer,255,fileConf);
	sscanf(buffer,"%*s %s",webname);

	strcpy(urlP,url);
	strcpy(nameP,webname);
	strcpy(urlAP,urlA);
	return 0;
}

