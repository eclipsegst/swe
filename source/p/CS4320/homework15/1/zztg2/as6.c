/***************************************************************************
 * Name:           Rama Akula,Amit
 * Userid:         ar442
 * Course:         CS 4520
 * Assignment#:    Assignment 6
 *
 * File name:      as6.c
 *
 * Question no:	   Programming project 3        
 *
 * Assumptions:    1) Let producer generate numbers between 0 and 100 only
 *		&		   2) Run the final program for 5 seconds with 2 producers 
 *	Precautions		  and 5 consumers 
 **************************************************************************/
#include "buffer.h"

buffer_item buffer[BUFFER_SIZE];

//insert item into buffer
int insert_item(buffer_item item)
{
	//place locks
    sem_wait(&buffEmpty);
    pthread_mutex_lock(&mutex);
	//place item
    buffer[insertIndex] = item;
    insertIndex = (insertIndex + 1) % BUFFER_SIZE;
	//remove locks
    pthread_mutex_unlock(&mutex);
    sem_post(&buffFull);
}

//remove item from buffer
int remove_item(buffer_item *item)
{
	//place locks
    sem_wait(&buffFull);
    pthread_mutex_lock(&mutex);
	//retrive item
    *item = buffer[removeIndex];
    removeIndex = (removeIndex + 1) % BUFFER_SIZE;
	//remove locks
    pthread_mutex_unlock(&mutex);
    sem_post(&buffEmpty);
}

//Thread runner for producer
void* ProducerRunner(void *arg)
{
    buffer_item item;

    while(1)
    {
        sleep(rand()%2);
        item = rand()%100;//generate a number between 0 and 99
        //check for errors
		if(insert_item(item) == -1)
        {
            printf("Error in inserting item in buffer\n");
        }
        else
        {
            printf("Producer produced %d\n",item);
        }
    }
}

//Thread runner for consumer
void* ConsumerRunner(void *arg)
{
    buffer_item item;

    while(1)
    {
        sleep(rand()%5);
		//check for errors
        if(remove_item(&item) == -1)
        {
            printf("Error in removing item from buffer\n");
        }
        else
        {
            printf("Consumer consumed %d\n",item);
        }
    }
}

int main(int argc, char *argv[])
{
    int sleepTime,numProd,numCons,counter;
    pthread_t *consThreads,*prodThreads;

    if(argc < 4)
    {
	printf("Insufficient arguments entered at command line\n");
	return -1;
    }
    sscanf(argv[1],"%d",&sleepTime);
    sscanf(argv[2],"%d",&numProd);
    sscanf(argv[3],"%d",&numCons);
	
	//error check for input parameters
    if(sleepTime < 0 || numCons < 1 || numProd < 1)
    {
        printf("Please enter positive values for parameters.\n"
        "Number of producers and consumers should be atleast 1");
    }
	
	//initialize buffer
    for(counter = 0;counter<BUFFER_SIZE;counter++)
    {
        buffer[counter] = 0;
    }
	
	//initialize indexes
    insertIndex = 0;
    removeIndex = 0;

	//allocate memory based on number of producers and consumers
    consThreads = calloc(numCons,sizeof(pthread_t));
    prodThreads = calloc(numProd,sizeof(pthread_t));
	
	//initialize the mutex and semaphores
    pthread_mutex_init(&mutex,NULL);
    sem_init(&buffEmpty,0,BUFFER_SIZE);
    sem_init(&buffFull,0,0);
	
	//create producer threads
    for(counter = 0;counter<numProd;counter++)
    {
        pthread_create(&prodThreads[counter],NULL,ProducerRunner,NULL);
    }
	
	//create consumer threads
    for(counter = 0;counter<numCons;counter++)
    {
        pthread_create(&consThreads[counter],NULL,ConsumerRunner,NULL);
    }
	
	//sleep for a fixed time passed as a parameters
    sleep(sleepTime);

	
	//free the dynamically allocated memory
    free(consThreads);
    free(prodThreads);

    printf("Exiting from main");
    return 0;
}
