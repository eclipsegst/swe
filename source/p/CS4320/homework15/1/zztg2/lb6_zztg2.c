/***************************************************************************
 * Name:           Zhaolong ZHONG
 * Pawprint:       zztg2  
 * Course:         CS 4520
 * Assignment#:    Lab 6
 *
 * File name:      lb6_zztg2.c
 *
 * Question no:    Programming project 3        
 *
 * Assumptions:    1) Let producer generate numbers between 0 and 100 only
 *    &      2) Run the final program for 5 seconds with 2 producers 
 *  Precautions     and 5 consumers 
 **************************************************************************/
#include "buffer.h"


buffer_item buffer[BUFFER_SIZE]; /* create buffer */
int counter;           /*global item counter*/
sem_t semEmpty;        /*semaphore*/
sem_t semFull;
pthread_mutex_t mutex; /*global mutex lock*/

/*insert_item function*/
int insert_item(buffer_item item)
{
  if(counter < BUFFER_SIZE) /*If buffer has space*/
  {
    buffer[counter] = item; /*insert item into buffer*/
    counter++;
    return 0;
  }
  else                      /*If buffer is full*/
  {
    return -1;
  }
}

/*remove_item function*/
int remove_item(buffer_item *item)
{
  if(counter > 0)                /* if there are items in buffer*/
  {
    *item = buffer[(counter-1)]; /* romove an item*/
    counter--;
    return 0;
  }
  else                           /* if buffer is empty*/
  {
    return -1;
  }
}

/*producer thread function*/
void *producer(void *param)
{
  buffer_item item;

  while(1)
  { 
    sleep(rand()%5);        /*sleep for a random period of time */
    item = (rand()%100);    /*generate a randome number */

    sem_wait(&semEmpty);    /*lock empty semaphore*/
    pthread_mutex_lock(&mutex);

    if(insert_item(item))
    {
      fprintf(stderr, "Producer error."); 
    }
    else
    {
      printf("Producer produced %d\n", item); 
    }

    pthread_mutex_unlock(&mutex);
    sem_post(&semFull);               /* increment semaphore*/
  }
}
//consumer thread function
void *consumer(void *param)
{
  buffer_item item;

  while(1)
  {
    sleep(rand()%5);
    sem_wait(&semFull);               /* lock empty semaphore */
    pthread_mutex_lock(&mutex);       /* lock counter*/
    if(remove_item(&item))
    {
      fprintf(stderr, "Consumer error."); 
    }
    else
    {
      printf("Consumer consumed %d\n", item);
    }

    pthread_mutex_unlock(&mutex);     /* unlock counter*/
    sem_post(&semEmpty);
  }
}

//main
main(int argc, char *argv[])
{
  /* Variables */
  int inputarray[3],i,j,k;
  pthread_mutex_init(&mutex, NULL);    /* Initialize mutex lock */
  pthread_attr_t attr;                 /* Initialize thread attributes */
  pthread_attr_init(&attr);            /* Initialize pthread attributes */
  sem_init(&semFull, 0, 0);            /* Initialize full semaphore */
  sem_init(&semEmpty, 0, BUFFER_SIZE); /* Initialize empty semaphore */
  counter = 0;                         /* Initialize global counter */ 
  for(k=0;k<BUFFER_SIZE;k++)           /* Initialize buffer */
  {
    buffer[k] = 0;
  }

  /*checks argument*/
  if(argc != 4)
  {
    fprintf(stderr, "usage: Input format ./a.out [sleep time] [# of producer] [# of consumer]\n");
    return -1;
  }

  inputarray[0] = atoi(argv[1]); /* main function sleep time */
  inputarray[1] = atoi(argv[2]); /* # of producer threads */
  inputarray[2] = atoi(argv[3]); /* # of consumer threads */  

  pthread_t pid[inputarray[1]];  /* producer threads */
  pthread_t cid[inputarray[2]];  /* consumer threads */
  
  for(i=0; i<inputarray[1]; i++) /* create the producer threads */
  {
    pthread_create(&pid[i], &attr, producer, NULL);   
  }

  for(j=0; j<inputarray[2]; j++) /* create the consumer threads */
  {
    pthread_create(&cid[j], &attr, consumer, NULL);   
  }

  sleep(inputarray[0]);

  pthread_mutex_destroy(&mutex);
  exit(0);
}





