//
//  RBTreeSA.cpp
//  TreesHw
//
//  Created by Ahmad Ilaiwi on 4/18/15.
//  Copyright (c) 2015 Ahmad Ilaiwi. All rights reserved.
//

#include "stdio.h"
#include "BSTreeSA.cpp"

using namespace std;

class RBTreeSA : public BsTreeSA {
    
public:
    RBTreeSA(int nodesNumber):
        BsTreeSA((nodesNumber*2)+1){
            root=0;
    }
    
    
    void RotateLeft(int x){
        int y=nodes[x].right;
        nodes[x].right=nodes[y].left;
        if (nodes[nodes[y].left].key!=-1) {
            nodes[nodes[y].left].parent = x;
        }
        nodes[y].parent=nodes[x].parent;
        if (nodes[x].parent==-1) {
            this->root=y;
        }
        else if (x==nodes[nodes[x].parent].left){
            nodes[nodes[x].parent].left=y;
        }
        else{
            nodes[nodes[x].parent].right=y;
        }
        nodes[y].left=x;
        nodes[x].parent=y;
    }
    
    void RotateRight(int y){
        
        int x=nodes[y].left;
        nodes[y].left=nodes[x].right;
        if (nodes[nodes[x].right].key!=-1) {
            nodes[nodes[x].right].parent = y;
        }
        nodes[x].parent=nodes[y].parent;
        if (nodes[y].parent==-1) {
            this->root=x;
        }
        else if (y==nodes[nodes[y].parent].right){
            nodes[nodes[y].parent].right=x;
        }
        else{
            nodes[nodes[y].parent].left=x;
        }
        nodes[x].right=y;
        nodes[y].parent=x;
    }
    
    void Add (int key, Data *n){
        //cout<<"add \n";
        //add
        int y=-1;
        int x=this->root;
        while (nodes[x].key>-1) {
            y=x;
            if (key==nodes[x].key) {
                *(nodes[x].data)->satellite=*(n)->satellite;
                return;
            }
            else
                if (key<nodes[x].key) {
                    x=nodes[x].left;
                }
                else {
                    x=nodes[x].right;
                }
        }
        if (y==-1) {
            
            this->root=emptySlots.front();
            emptySlots.pop();
            x=this->root;
            nodes[x].key=key;
            nodes[x].left=emptySlots.front();
            emptySlots.pop();
            nodes[x].right=emptySlots.front();
            emptySlots.pop();
            
        }
        else{
            if (key<nodes[y].key) {
                x=nodes[y].left;
                nodes[x].key=key;
                nodes[x].data=n;
                nodes[x].parent=y;
                nodes[x].left=emptySlots.front();
                emptySlots.pop();
                nodes[x].right=emptySlots.front();
                emptySlots.pop();
                
                
            }
            else
            {
                x=nodes[y].right;
                nodes[x].key=key;
                nodes[x].parent=y;
                nodes[x].data=n;
                nodes[x].left=emptySlots.front();
                emptySlots.pop();
                nodes[x].right=emptySlots.front();
                emptySlots.pop();
                
                
            }
            
        
        }
    
    
        if (x==this->root) {
            nodes[x].red=false;
        }
        else{
            nodes[x].red=true;
        }
        
        while (nodes[nodes[x].parent].red) {
            if (nodes[x].parent==nodes[nodes[nodes[x].parent].parent].left) {
                y=nodes[nodes[nodes[x].parent].parent].right;
                if (nodes[y].red) {
                    nodes[nodes[x].parent].red=false;
                    nodes[y].red=false;
                    nodes[nodes[nodes[x].parent].parent].red=true;
                    x=nodes[nodes[x].parent].parent;
                }
                else if (x==nodes[nodes[x].parent].right){
                    x=nodes[x].parent;
                    RotateLeft(x);
                }
                nodes[nodes[x].parent].red=false;
                nodes[nodes[nodes[x].parent].parent].red=true;
                RotateRight(nodes[nodes[x].parent].parent);
            }
            else{
                    y=nodes[nodes[nodes[x].parent].parent].left;
                    if (nodes[y].red) {
                        nodes[nodes[x].parent].red=false;
                        nodes[y].red=false;
                        nodes[nodes[nodes[x].parent].parent].red=true;
                        x=nodes[nodes[x].parent].parent;
                    }
                    else if (x==nodes[nodes[x].parent].left){
                        x=nodes[x].parent;
                        RotateRight(x);
                    }
                    nodes[nodes[x].parent].red=false;
                    nodes[nodes[nodes[x].parent].parent].red=true;
                    RotateRight(nodes[nodes[x].parent].parent);

            }
        }
        nodes[root].red=false;
    
    }
    
    void treeWalkTest(){
        treeWalkTestHelp(this->root);
    }
    
    void treeWalkTestHelp(int x)
    {
        if(nodes[x].key==-1){return;}
        treeWalkTestHelp(nodes[x].left);
        cout<<nodes[x].key<<"\n";
        treeWalkTestHelp(nodes[x].right);
        
    }
};
