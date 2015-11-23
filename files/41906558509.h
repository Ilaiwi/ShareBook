//
//  BSTree.h
//  DataAlog
//
//  Created by Sam on 3/31/14.
//  Copyright (c) 2014 Sam. All rights reserved.
//

#ifndef __DataAlog__BSTree__
#define __DataAlog__BSTree__

#include <iostream>

#define SAT_DATA_SIZE 8

typedef struct Data
{
    int key;
    int satellite[SAT_DATA_SIZE];
    
} Data;


class BSTree // virtual base class
{

public:
    
    // returns whether the tree contains the following value or not
    virtual bool Search(int key) = 0;
    
    // Adds a single data item to the tree.  If there is already an
    // item in the tree that compares equal to the item being inserted,
    // it is "overwritten" by the new item.
    
    virtual void Add(int key, Data *n) = 0;
    
    // returns the successor for a key if found
    virtual Data *Successor(int key) = 0;

    // export the content of the tree as an ordered array
    virtual void BSTreeSort(Data *A, int size) = 0;
    
    // returns the size of the tree
    virtual int Size() = 0;
    
    // return the information of the node with the minimum key
    virtual Data * GetMin() = 0;
    
    
    // return the information of the node with the maximum key
    virtual Data * GetMax() = 0;

};

#endif /* defined(__DataAlog__BSTree__) */
