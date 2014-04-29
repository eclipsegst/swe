// Name:Zhaolong Zhong

#include <stdio.h>

void verifyFile(int argc, char *argv[])
{
	printHelloMake();
	if (argc != 2){
		fprintf(stderr, "Incorrect input format, try ./prog zztg2.txt\n");
	} else{
		if(strcmp(argv[1],"zztg2.txt") != 0){	
		printf("%s does not exist.\n",argv[1]);
		}
		else{
			printf("%s exists.\n",argv[1]);
		}
	}
	
	return;
}

// void printVerifiyFile()
// {
// 	printf("This is a print from verifyFile.\n");
// 	printf("Hola is spanish for Hello!\n");
// 	return;
// }
