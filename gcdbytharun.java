//Great Common Divisior by Tharun Thathsara

import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);

        System.out.print("Enter the Number 1 = ");
        int num1  = input.nextInt();
        System.out.print("Enter the Number 2 = ");
        int num2 = input.nextInt();

        Main obj = new Main();
        System.out.print("The Final Great Common Divisor is "+obj.GCD(num1,num2));
    }

    public static int GCD(int n1, int n2)
    {
        if (n2==0)
        {
            return n1;
        }
        else
        {
            return GCD(n2,n1%n2);
        }
    }
}