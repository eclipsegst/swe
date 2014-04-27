# Software Engineering - Submission Program - Group N
#
#
# 'make'	build executable file 'prog'
# 'make clean'	removes all .o and executable files
#


# flag to replace gcc,  $(CC) = gcc
CC=gcc
COPTS=
LOPTS=

# The standard default target is all
all: cs_subprog

#############################################
# Link the object files
cs_subprog: cs_subProg.o verifyFile.o log.o readConf.o
	@echo "Linking $^ to generate executable file: $@"
	$(CC) -o $@ $^ -L/usr/lib/i386-linux-gnu -lcurl -lssl -lcrypto


#############################################
# Compile the file cs_subProg.c
cs_subProg.o: cs_subProg.c sub_header.h
	@echo "Compiling file $<"
	$(CC) -c $< -g
	
#############################################
# Compile the file verifyFile.c
verifyFile.o: verifyFile.c 
	@echo "Compiling file $<"
	$(CC) -c $< -g

#############################################
# Compile the file log.c
log.o: log.c 
	@echo "Compiling file $<"
	$(CC) -c $< -g

#############################################
# Compile the file readConf.c
readConf.o:	readConf.c sub_header.h
	@echo "Compiling file $<"
	$(CC) -c $< -g

#############################################
# clean up all the .o files and executable created
# type: 'make clean'
clean:
	rm -rf *.o cs_subprog


