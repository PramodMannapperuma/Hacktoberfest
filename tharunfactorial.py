# Factorial of a number using recursion

from cgitb import reset
from math import factorial
import sys
from unittest import result

def main():
    print(sys.argv)
    #check
    if(len(sys.argv)>=2):
        #convert
        result = factorial_recursive(int(sys.argv[1]))
        print(result)
    else:
        print("Please enter a number = ")

def factorial_recursive(n):
    if n == 1:
        return n
    else:
       return n*factorial_recursive(n-1)