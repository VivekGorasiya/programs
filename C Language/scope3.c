/**
    variable with local scope
*/

#include<stdio.h>

void main(){
    int x = 10;
    printf("\n value of x is %d", x);

    {
        int x = 15;
        printf("\n value of x is %d", x);
    }

    printf("\n value of x is %d", x);
}
