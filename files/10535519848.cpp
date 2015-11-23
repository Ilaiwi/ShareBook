//
//  BSTreeSA.cpp
//  TreesHw
//
//  Created by Ahmad Ilaiwi on 4/17/15.
//  Copyright (c) 2015 Ahmad Ilaiwi. All rights reserved.
//

#include <stdio.h>
#include "BSTree.h"
#include <queue>
#include <stack>
using namespace std;

struct NODE{
    Data *data;
    int left ;
    int right;
    int key;
    int parent;
    bool red;
};

class BsTreeSA : public BSTree{
    protected : NODE *nodes;
    int root;
    int NumberOfNodes;
    queue<int> emptySlots;
    stack<int> fullSlots;
public:
    BsTreeSA(int nodesNumber){
        root=-1;
        nodes=new NODE[nodesNumber];
        for (int i=0; i<nodesNumber; i++) {
            nodes[i].key=-1;
            nodes[i].left=-1;
            nodes[i].right=-1;
            emptySlots.push(i);
            nodes[i].parent=-1;
            nodes[i].red=false;
        }
        NumberOfNodes=nodesNumber;
    }
    // returns whether the tree contains the following value or not
    bool Search(int key){
        int x=root;
        while (nodes[x].key!=-1) {
            if (nodes[x].key==key) {
                return true;
            }
            else if (nodes[x].key>key){
                x=nodes[x].left;
            }
            else{
                x=nodes[x].right;
            }
        }
        return false;
    }
    
    
    int SearchAndReturn(int key){
        int x=root;
        while (nodes[x].key!=-1) {
            if (nodes[x].key==key) {
                return x;
            }
            else if (nodes[x].key>key){
                x=nodes[x].left;
            }
            else{
                x=nodes[x].right;
            }
        }
        return -1;
    }
    
    // Adds a single data item to the tree.  If there is already an
    // item in the tree that compares equal to the item being inserted,
    // it is "overwritten" by the new item.
    
    void Add(int key, Data *n){
        int y=-1;
        int x=this->root;
        while (x>-1) {
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
            fullSlots.push(root);
            nodes[this->root].key=key;
        }
        else{
            if (key<nodes[y].key) {
                nodes[y].left=emptySlots.front();
                emptySlots.pop();
                fullSlots.push(nodes[y].left);
                nodes[nodes[y].left].key=key;
                nodes[nodes[y].left].data=n;
                nodes[nodes[y].left].parent=y;
            }
            else
            {
                nodes[y].right=emptySlots.front();
                emptySlots.pop();
                fullSlots.push(nodes[y].right);
                nodes[nodes[y].right].key=key;
                nodes[nodes[y].right].parent=y;
                nodes[nodes[y].right].data=n;
                
            }
            
        }
    }
    

    Data *Successor(int key){
        int temp=SearchAndReturn(key);
        int x;
        if (nodes[temp].right!=-1) {
            x=temp;
            while (nodes[x].left!=-1) {
                x=nodes[x].left;
            }
            return nodes[x].data;
        }
        int y=nodes[temp].parent;
        while (y!=-1 && temp==nodes[y].right) {
            x=y;
            y=nodes[y].parent;
        }
        return nodes[y].data;
    }
    
    
    int Size(){
        return (NumberOfNodes-(int)emptySlots.size());
    }
    
    void treeWalkTest(int x)
    {
        if(x==-1){return;}
        treeWalkTest(nodes[x].left);
        cout<<nodes[x].key<<"\n";
        treeWalkTest(nodes[x].right);
        
    }

    
    void treeWalk(int x , Data *A , int i)
    {
        if(x==-1){return;}
        treeWalk(nodes[x].left, A,i);
        i++;
        A[this->Size()-i]=*nodes[x].data;
        treeWalk(nodes[x].right, A, i);
        
    }
    // export the content of the tree as an ordered array
    void BSTreeSort(Data *A, int size)
    {
        A= new Data[size];
        treeWalk(root, A, 0);
    }
    
    // returns the size of the tree
    
    
    // return the information of the node with the minimum key
    Data * GetMin(){
        int x=root;
        while (nodes[x].left!=-1) {
            x=nodes[x].left;
        }
        return nodes[x].data;
    }
    
    
    // return the information of the node with the maximum key
    virtual Data * GetMax(){
        int x=root;
        while (nodes[x].right!=-1) {
            x=nodes[x].right;
        }
        return nodes[x].data;
    }
    
    void printline(){
        queue <int> lst1 , lst2 ;
        
        lst1.push(this->root);
        while(!lst1.empty()){
            cout<<endl;
            while(!lst1.empty()){
                lst2.push(lst1.front());
                cout<<nodes[lst1.front()].key<<"->"<<nodes[lst1.front()].parent<<"\t";
                lst1.pop();
                
            }
        
        while(!lst2.empty()){
            
            if(nodes[(lst2.front())].left!=-1)
                lst1.push(nodes[lst2.front()].left);
            if((nodes[lst2.front()].right)!=-1)
                lst1.push((nodes[lst2.front()]).right);
            lst2.pop();
        }
        
        cout<<endl;
        }
    }

    void printArray(){
        cout<<"\n"<<this->root;
        for (int i=0; i<this->NumberOfNodes; i++) {
            cout<<"\n"<<i<<"\t"<<nodes[i].key<<"\t"<<"\t"<<nodes[i].left<<"\t"<<nodes[i].right<<"\t"<<nodes[i].parent;
        }
    }

};