1. Extract this file into htdocs file via either MAMP or XAMPP, whichever 
   you utilize - or import into NetBeans to same directory.
2. Be sure Apache and MySQL are up and running.
3. If your php.ini file is set to allow for ini_set() adjustments, the file will work.
    I had some issue with this file while attempting it at my place of employ, 
    but I fear that was due to our filewall and the inability to manipulate settings 
    on my system, there.
4. Browse http://localhost/sellisitp225mod5
5. After page is loaded, a session cookie named "TLM" (for Task List Manager) should
    be viewable and will be set for a year, and will hold the session array for the tasks.

The array is no longer held in hidden form fields, and when your browser is shut down, 
the array will persist.