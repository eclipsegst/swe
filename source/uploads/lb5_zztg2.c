/***************************************************************************
 * Name:           Zhaolong Zhong
 * Userid:         14167474
 * Course:         CS 4520
 * Assignment#:    Lab 5
 *
 * File name:      lb5_zztg2.c
 *
 * Question no:	   5.37        
 *
 * Assumptions:    1) Which data is involved in race condition ? 
 *		&		   2) When does the race condition occur ? 
 *	Precautions	   3) MAX_RESOURCES should defines the max number of resources
 * 				   4) NUM_PROCESSES should defines the no of threads to create
 *				   5) cc -pthread -lpthread lb5.c
 *				   6) Check instructions doc for additional instructions
 **************************************************************************/
//// gcc -pthread -lpthread lb5_zztg2.c 
#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>

//define NUM_PROCESSES
#define NUM_PROCESSES 10
//define MAX_RESOURCES
#define MAX_RESOURCES 5
//global variable declaration for available_resources
int available_resources = MAX_RESOURCES;
//other global declarations
pthread_mutex_t lock;
//function that thread runs
void *runner(void *pt)
{
	int count = rand()%MAX_RESOURCES+1;
	int status = decrease_count(count);
	if(status == 0){
		sleep(rand()%5);
		increase_count(count);
	}
}

//increase_count function
int increase_count(int count)
{
	pthread_mutex_lock(&lock);// lock available_resources
	available_resources += count;
	printf("%d resources released and the available resources are :%d\n",count,available_resources);
	pthread_mutex_unlock(&lock);// unlock available_resources
	return 0;
}

//decrease_count function
int decrease_count(int count)
{
	if(available_resources < count)
	{
		return -1;
	}
	else{
		pthread_mutex_lock(&lock);// lock available_resources
		available_resources -= count;
		printf("Request made for %d  resources and the available resources are now :%d\n",count,available_resources);
		pthread_mutex_unlock(&lock);// unlock available_resources
		return 0;
	}
}

int main()
{
	//initialization
	int i, *pt;
	pthread_t threads[NUM_PROCESSES];
	
	//create threads
  	for(i=0; i<NUM_PROCESSES; i++){
    	pthread_create(&threads[i], NULL, runner, pt);
    	pthread_join(threads[i], NULL);
  	}
  	//destroy lock
  	pthread_mutex_destroy(&lock);
  	printf("Available resources are : %d\n",available_resources);
}