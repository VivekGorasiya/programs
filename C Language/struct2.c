#include<stdio.h>

/**
    structure is used to combine multiple data types

    struct structure_name{
        members
    }
*/

struct student{
    int roll;
    char name[20];
    float percentage;
};

void main(){
    struct student s1 = {11, "Tushar", 88.99};
    printf("\n Size of structure is %d bytes", sizeof(s1));

    printf("\n Welcome %s your roll no. is %d and percentage are %f", s1.name, s1.roll, s1.percentage);
}
