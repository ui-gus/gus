\documentclass[12pt, oneside, letterpaper]{article}
%\usepackage{ifpdf}
%\usepackage[colorlinks,bookmarksopen]{hyperref}
%\usepackage{fullpage}
\usepackage{layout}
\usepackage{lscape}
\textwidth=475pt
\hoffset=-.5in
\begin{document}
	\tableofcontents
\section} {Management Plan}
To keep track of how much progress has been made toward meeting user requirements, and to document how much each member of the team has contributed, the PHP team plans to use TRAC to develop tickets for hour reporting, PHP doc to demonstrate number of lines of code written, and GitHub to demonstrate trends in the number of lines of code each person wrote.

	\subsection{Tickets through TRAC}
	\url{http://www.nwerp.org/trac/gus/report/6}\\
	TRAC is a valuable tool that not only communicates when a task should be completed, but also who was assigned to complete the task, and who actually completed the task. The testing/documentation subteam has and will continue to generate tickets through TRAC by:
	\begin{itemize}
		\item identifying the tasks to be completed
		\item estimating the number of hours required to complete the tasks
		\item recording the responsible individual to complete the task
	\end{itemize}
	The responsible individual then will:
	\begin{itemize}
		\item work on their tickets, to include writing unit-tests and writing a PHP docstring to the unit testcase specification template
		\item submit the code to the repository
		\item record the number of hours spent writing the code
	\end{itemize}

\section{Test Plan}
\url{http://www.nwerp.org/gus/index.php/test}\\
Each software developer will be responsible for writing use cases to demonstrate the functionality of their code. PHP Coverage (Black Duck Software) will be used to demonstrate all the lines of code have been tested, and PHP Unit will be used to write the unit tests.  As the semester progresses, the testing/documentation team will cross-reference the unit
testcase specification templates into the test management plan.

	\subsection{Unit Testing Template}
	\url{http://wiki.services.openoffice.org/wiki/Test_case_specification_template}\\
	Each software developer will use the testcase specification template identified in class to write their test cases. Where possible, the test case will:
	\begin{itemize}	
		\item have the developer's name on top
		\item cross-reference the use-case in the SSRS
		\item cross-reference the page illustrating the use-case
		\item cross-reference the page showing the results of the unit test
		\item document what was tested
	\end{itemize}

	\subsection{Code Igniter Unit Testing}
	\url{http://codeigniter.com/user_guide/libraries/unit_testing.html}\\
	To automate integration and structural testing, each unit test will use Code Igniter Unit Testing (where possible). Unit tests will try to demonstrate that the unit does indeed do what it's designed to do, by comparing actual results against what the unit is supposed to do. Each Unit Test will represent an edge in the SSRS Use Cases, and will be directly linked to by that documentation.

	\subsection{Integration and Structural Testing}
	The testing/documentation subteam will complete a structural regression test every sprint to ensure that all of the GUS components work together. This will include an assessment of Red/Green Light testing, and tracking which tests have passed over time. The PHP Doc/Test team will review each set of tests each scrum to determine that they have sufficient depth. As functionality of GUS grows, superior classes will aggragate basic classes, and the unit testing of the superior classes will be sufficient enought to qualify as Integration Testing.

	\subsection{System Testing}
	To ensure the customer's requirements are met, PHP will complete functional, performance, acceptance, and installation testing. System Testing will be conducting through development as the GUS system is being used for actual project planning. Bug will be recorded, delegated, and fixed using the Trac system linked to the GUS development.

	\subsection{Functional Testing}
	To the extent possible, PHP will include scripts to simulate GUS users completing the use-cases stated in the SSRS. Each function in the SSRS Use Cases will link to the test and the actual location in the code where it is implemented.

	\subsection{Performance Testing}
	Using the scripts generated for functional testing, PHP will test the \textbf{scalability} of GUS to the estimated load of 10,000 users (1000 actively involved) 500 of which will be actively logged in at any given time.  The number of groups is easier to estimate at 200 groups, 20 of which are actively involved with ASUI. The Security Subteam will write scripts and controllers to test the system, and have respective tests to pass or fail. This will include web robots and perforance logging during development.

	\subsection{Usability Testing}
	PHP continuously completes alpha tests through the use of the testing/documentation team. The testing/documentation team completes an alpha-type usability test every time they take a screen-shot to make an updated entry in the user's manual. Each significant release of GUS will be compared with the Customer Requirements in the SSRS, either directly mapped or loosely. Trac Milestones containing all Major Customer requirements are set, and those requirements are further drilled down into billable tasks with Trac tickets. PHP will complete at least one beta test with university groups.  Ideally, we could beta test with ASUI. One of the groups that has already agreed to complete a beta test is Lutheran Campus Ministry.

\section{Metric Plan}
Metrics will include:
\begin{itemize}
	\item PHP Coverage (Black Duck Software)
	\item Red/Green Light Tracking
	\item Trac Billable Hours
	\item Github Impact Statements
	\item LOC tracking
	\item SSRS/Trac Customer requirements met
	\\ \\
	Coverage testing will be run once a week, as well as Red/Green Light Tracking, as soon as an automated system is built to run them(Scrum 8?). Trac Billable Hours will be used weekly (starting Scrum 6), as well as LOC Tracking. Github Impact Statements have been active since Fall 2010. SSRS/Trac Customer Requirements are also in use, and will be full defined (Scrum 8?).

\end{itemize}


\end{document}
