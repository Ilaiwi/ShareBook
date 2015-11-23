//
//  main.cpp
//  TreesHw
//
//  Created by Ahmad Ilaiwi on 4/17/15.
//  Copyright (c) 2015 Ahmad Ilaiwi. All rights reserved.
//

#include <iostream>
//#include "BSTreeSA.cpp"
#include "RBTreeSA.cpp"

using namespace std;

int main(int argc, const char * argv[]) {
    RBTreeSA temp(10);
    for (int i=0; i<10; i++) {
        int x=rand()%100;
        temp.Add(x, new Data());
        cout<<x<<"\n";
    }
    //temp.printline();
    //temp.RotateRight(2);
    cout<<"\n\n";
    //temp.printline();
    cout<<"\n\n";
    temp.printArray();
    cout<<"\n\n";
    //temp.printline();
    temp.treeWalkTest();
    
    
}
