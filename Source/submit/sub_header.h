#include <stdio.h>
#include <string.h>
#include <sys/stat.h>
#include <stdlib.h>

#define MAX_FILE_SIZE 5242880	//5MB


char *course;
char *section;
char *filename;
char *assign;
char *course_section;
struct stat st;
off_t fSize;
char *userName;

void cleanup();

int validateParametersPassed();

int validateFilePassed();

//TO DO
int getUserInfo();

int readConfigFile();

int sendFile();
