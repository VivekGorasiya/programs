#include<stdio.h>

/**
    box structure
*/

struct box{
    int h, w, b;
};

void main(){
    struct box b1;
    int ans;
    printf("\n Size of Structure is %d bytes ",sizeof(b1));

    printf("\n Enter Height of Box \t");
    scanf("%d", &b1.h);
    printf("\n Enter Width of Box \t");
    scanf("%d", &b1.w);
    printf("\n Enter Breadth of Box \t");
    scanf("%d", &b1.b);

    ans = b1.h * b1.w * b1.b;

    printf("\n Volume of Box is %d", ans);
}
