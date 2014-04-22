#include <stdio.h>
#include <string.h>
#include <sys/stat.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <pwd.h>

#define MAX_FILE_SIZE 5242880	//5MB


char *course;
char *section;
char *filename;
char *assign;
char *course_section;
struct stat st;
off_t fSize;
char *userName;
struct passwd *pwptr;
char url[255];
char webname[255];

void cleanup();

int validateParametersPassed();

int validateFilePassed();

//TO DO
char *getPawprint();


int sendFile();
