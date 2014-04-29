#include <stdio.h>

int main(int argc, char *argv[])
{

	printf("%s",argv[2]);
	if(strcmp(argv[1],"zztg2") != 0)
	{
		printf("%s is not exist.\n",argv[1]);	
	}
	else{
		printf("%s is authorized user. \n",argv[1]);
	}
}