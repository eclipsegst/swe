#include <stdio.h>
#include <string.h>
#include <sys/stat.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <pwd.h>
#include <curl/curl.h>
#include <openssl/evp.h>

#define EVP_MAX_MD_SIZE 64 

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
char urlAdd[255];
char webname[255];
struct string {
  char *ptr;
  size_t len;
};
unsigned char md_value[EVP_MAX_MD_SIZE];
void init_string(struct string *s);

size_t writeFunc(void *ptr, size_t size, size_t nmemb, struct string *s);

void cleanup();

int validateParametersPassed();

int validateFilePassed();

//TO DO
char *getPawprint();


int sendFile();
void GenerateHashCode();
