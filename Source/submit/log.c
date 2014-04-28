//Support file for submit program performs log operations

#include <stdio.h>
#include <unistd.h>
#include <pwd.h>
#include <grp.h>
#include <time.h>
#include <sys/time.h>
#include <string.h>

#define logFileName "log"

struct timeval tp;
struct tm *tmptr;
FILE *fileLog;

char timeNow[30];

//Check if log file exists, if not create it
int initializeLog()
{
	char initMessage[255];
	//open file to see if it exists
	fileLog = fopen(logFileName,"r");
	//NULL means file doesn't exist or not
	//insufficient privilege
	
	getTime();
	if(fileLog == NULL)
	{
		sprintf(initMessage,"Log File Submit Program - Created on %s\n\n",timeNow);
		
		fileLog = fopen(logFileName,"w");
		fprintf(fileLog,initMessage);
		fclose(fileLog);
	}
	//File exists print success
	else
	{
		fclose(fileLog);
	} 
	
	return 0;	
}
		
//wrapper for gettimeofday to store time
int getTime()
{
	
	gettimeofday(&tp,NULL);
	tmptr = localtime(&tp.tv_sec);
	sprintf(&timeNow,"%d/%d/%d - %d:%d:%d",tmptr->tm_mon+1,tmptr->tm_mday,tmptr->tm_year+1900,tmptr->tm_hour,tmptr->tm_min,tmptr->tm_sec);
	return 0;
}

//Make an entry into the log file
int makeLogEntry( char *message)
{
	
	getTime();
	initializeLog();
	fileLog = fopen(logFileName,"a");
	char *uname = getPawprint();
	if(fileLog != NULL)
	{
		fprintf(fileLog,"[%s] - [%s] -[%s]\n\n",timeNow,uname,message);
	}
}

