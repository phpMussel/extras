using System;
using System.Windows.Forms;
using System.Threading;

public class EXE_Standard_Testfile
	{
	public static void Main()
		{
		Console.WriteLine("      _____  _     _  _____  _______ _     _ _______ _______ _______           \n <   |_____] |_____| |_____] |  |  | |     | |______ |______ |______ |        >\n     |       |     | |       |  |  | |_____| ______| ______| |______ |_____    \n Thank you for using phpMussel, a php-based script based upon ClamAV signatures\n  designed to detect trojans, viruses, malware and other threats within files  \n             uploaded to your system wherever the script is hooked.            \n     PHPMUSSEL COPYRIGHT 2013 and beyond GNU/GPL V.2 by Caleb M (Maikuolan)    \n\n                                  ~ ~ ~                                        \n\n   This file, 'exe_standard_testfile.exe', is a test file used to ensure that   \n   phpMussel has been installed correctly on your system. It serves no other    \n          purpose or function. TESTFILE ID: exe_standard_testfile.exe           \n\n");
		string s="seconds...";
		for(int i=5;i>0;i--)
			{
			if(i<2)s="second... ";
			Console.Write("This window will close in "+i+" "+s+"\r");
			Thread.Sleep(1000);
			}
		}
	}