//
//  BSTreeMA.cpp
//  TreesHw
//
//  Created by Ahmad Ilaiwi on 4/20/15.
//  Copyright (c) 2015 Ahmad Ilaiwi. All rights reserved.
//

//

#include <stdio.h>
#include "BSTree.h"
#include <queue>
#include <stack>
using namespace std;


class BSTreeMA : public BSTree{
    protected : int *left , *right ,* key, *parent ;
    Data** data;
    int root;
    int NumberOfNodes;
    queue<int> emptySlots;
    stack<int> fullSlots;
public:
    BSTreeMA(int nodesNumber){
        root=-1;
        left = new int [nodesNumber];
        parent = new int [nodesNumber];
        right = new int [nodesNumber];
        key = new int [nodesNumber];
        data = new Data* [nodesNumber];
        for (int i=0; i<nodesNumber; i++) {
            key[i]=-1;
            left[i]=-1;
            right[i]=-1;
            emptySlots.push(i);
            parent[i]=-1;
            
        }
        NumberOfNodes=nodesNumber;
    }
    // returns whether the tree contains the following value or not
    bool Search(int key){
        int x=root;
        while (this->key[x]!=-1) {
            if (this->key[x]==key) {
                return true;
            }
            else if (this->key[x]>key){
                x=this->left[x];
            }
            else{
                x=this->right[x];
            }
        }
        return false;
    }
    
    
    int SearchAndReturn(int key){
        int x=root;
        while (this->key[x]!=-1) {
            if (this->key[x]==key) {
                return x;
            }
            else if (this->key[x]>key){
                x=this->left[x];
            }
            else{
                x=this->right[x];
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
            if (key==this->key[x]) {
                *(data[x])->satellite=*(n)->satellite;
                return;
            }
            else
                if (key<this->key[x]) {
                    x=this->left[x];
                }
                else {
                    x=this->right[x];
                }
        }
        if (y==-1) {
            this->root=emptySlots.front();
            emptySlots.pop();
            fullSlots.push(root);
            this->key[this->root]=key;
        }
        else{
            if (key<this->key[y]) {
                this->left[y]=emptySlots.front();
                emptySlots.pop();
                fullSlots.push(this->left[y]);
                this->key[this->left[y]]=key;
                this->data[this->left[y]]=n;
                this->parent[this->left[y]]=y;
            }
            else
            {
                this->right[y]=emptySlots.front();
                emptySlots.pop();
                fullSlots.push(this->right[y]);
                this->key[this->right[y]]=key;
                this->data[this->right[y]]=n;
                this->parent[this->right[y]]=y;
            }
            
        }
    }
    
    
    Data *Successor(int key){
        int temp=SearchAndReturn(key);
        int x;
        if (this->right[temp]!=-1) {
            x=temp;
            while (this->left[temp]!=-1) {
                x=this->left[x];
            }
            return this->data[x];
        }
        int y=this->parent[temp];
        while (y!=-1 && temp==this->right[y]) {
            x=y;
            y=this->parent[y];
        }
        return this->data[y];
    }
    
    
    int Size(){
        return (NumberOfNodes-(int)emptySlots.size());
    }
    
    void treeWalkTest(int x)
    {
        if(x==-1){return;}
        treeWalkTest(this->left[x]);
        cout<<this->key[x]<<"\n";
        treeWalkTest(this->right[x]);
        
    }
    
    
    void treeWalk(int x , Data *A , int i)
    {
        if(x==-1){return;}
        treeWalk(this->left[x], A,i);
        i++;
        A[this->Size()-i]=*this->data[x];
        treeWalk(this->right[x], A, i);
        
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
        while (this->left[x]!=-1) {
            x=this->left[x];
        }
        return this->data[x];
    }
    
    
    // return the information of the node with the maximum key
    virtual Data * GetMax(){
        int x=root;
        while (this->right[x]!=-1) {
            x=this->right[x];
        }
        return this->data[x];
    }
    
    void printline(){
        queue <int> lst1 , lst2 ;
        
        lst1.push(this->root);
        while(!lst1.empty()){
            cout<<endl;
            while(!lst1.empty()){
                lst2.push(lst1.front());
                cout<<this->key[lst1.front()]<<"\t";
                lst1.pop();
                
            }
            
            while(!lst2.empty()){
                
                if(this->left[(lst2.front())]!=-1)
                    lst1.push(this->left[lst2.front()]);
                if((this->right[lst2.front()])!=-1)
                    lst1.push((this->right[lst2.front()]));
                lst2.pop();
            }
            
            cout<<endl;
        }
    }
    
    
};