//
//  Nom:        Royere
//  Prénom:     Matisse
//  Objectif:   Tester si le Ploppy 3/2 est si rentable que ça
//
#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <time.h>



int main(void){
    srand(time(NULL));
    printf("\n");
    int color, column, example, budget ,total= 0;
    int win_small, win_medium, win_large;
    int  loose_large;
    char choice;
    int alleatoire;

    printf("you play a roulette simulator at the casino.\n");
    printf("The tecnicale use here is the 'ploppy 3/2', \n");
    printf("we must bet 3/5 on a COLOR and 2/5 on a COLUMN \n");

    printf("your budget must be at least 5 times the amount bet on a round (color + column) \n");

    printf("what is your budget ? ");
    scanf("%d", &budget);

    do {
        printf("\nhow much do you bet on color ? ");
        scanf(" %d", &color);
        printf("\nhow much do you bet on column ? ");
        scanf(" %d", &column);

        if (color *2 != column *3) {
            printf("your number is not right \nyou must bet 3/5 on a COLOR and 2/5 on a COLUMN ! ");
        }
    }while (color *2 != column *3);

    printf("\nHow many repetion do you want for example ? ");
    scanf(" %d", &example);


    printf("\nWould you want stop the program if you ran out of money ?\nWrite yes or no: ");
    scanf(" %c", &choice);



    /*
    color = 15;
    column = 10;
    budget = 150;
    example = 20;
    */

    loose_large = color + column ;
    win_small =  color - column ;
    win_large = color + column ;

    printf("you are 70%% chance of win 🏆\n");
    printf("but \n");
    printf("you are 59%% chance of win: %d \n", win_small );
    printf("you are 10%% chance of win: %d \n", win_large );
    printf("you are 31%% chance of LOSE: %d \n", loose_large );
    printf("\n");
    printf("\n");
    printf("\n💵 Budget: %d€.   Bet by round: %d€\n", budget, color + column);

    for (int i = 0; i < example; i++) {
        alleatoire = rand() % 38 ;
        printf(" 🎯 %d \n", alleatoire);

        if (alleatoire == 6 || alleatoire == 15 || alleatoire == 24 || alleatoire == 33) {
            printf("you win %d€ 🏆 \n", win_large);
            total = total + win_large;
            printf("    total %d€\n", total);
        } else if(alleatoire == 2 || alleatoire == 4  || alleatoire == 8 || alleatoire == 10 || alleatoire == 11 || alleatoire == 13 || alleatoire == 17 || alleatoire == 20 || alleatoire == 22 || alleatoire == 26 || alleatoire == 28 || alleatoire == 29 || alleatoire == 31 || alleatoire == 35 || alleatoire == 3 || alleatoire == 9 || alleatoire == 12 || alleatoire == 18 || alleatoire == 21 || alleatoire == 27 || alleatoire == 30 || alleatoire == 36) {
            printf("you win %d€ \n", win_small);
            total = total + win_small;
        }else {
            printf("you LOSE ❌ %d€ \n", loose_large);
            total = total - loose_large;
            printf("    total %d€\n", total);
        }
        if((i+1)%5==0) printf(" In %d rounds the total is %d€\n", i+1, total);
        if (budget + total <= 0) {
            if(choice == 'y' || choice == 'Y') {
                printf("\n 🚨You have lost all your budget! 🚨");
                break;
            }


        }
    }
    printf("\n");
    printf("Your profit is  %d€ \n", total);
    printf("In total you are %d€ \n", budget + total);







    return 0;
}
