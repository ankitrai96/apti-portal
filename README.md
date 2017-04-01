## Aptitude Portal
### online aptitude test platform based on hypertext preprocessor 

## Background
My college occasionally conducts NAT (i.e. NIET Aptitude Test). The test is designed by faculty members to help groom students' aptitude and reasoning. So, being a computer science student with inclination towards information techonology, I took the liberty to develope a platform that would facilitate both faculty members as well as students.

## MODULES:-
### * cPanel
  - to add, delete and modify questions and answers
  - to add and delete tests under respective categories
  - to change status (active/inactive) of tests under various categories
  
### * LeaderBoard
  - Scoreboard (seperate for all tests made live) to list marks obtained by students who attempted. And of course, the marks are arranged in descending order

### * QuestionPage
  - timer, so programmed that upon finishing, would automatically submit the test
  - questions being retreived all at once from MySQL database via pHp
  
### * EvaluationPage
  - test once finished, is followed by an Evaluation Page where the student will be shown a summary of his test, including marks scored, question attempted, etc.
  - Please note that a student can re-attempt a particular test as many times as they want. However, only the score of first attempt of that test will be considered for its LeaderBoard
  
