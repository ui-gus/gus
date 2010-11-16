/* Functions begin with capital letters, variables begin with lower case letters */

#include "gusConf.h"

db *db1 = new db; //db1 has to be created here for bison. Working on a work around

using namespace std;
class userl;                 // a member of a user list
class groupl;
class user;

class group
{
int number;                   //Reference number for the group
char* name;                   //Name of the group
userl* leader;                //pointer to the head of the group leader list
userl* mod;                   //pointer to the head of the moderator list
userl* member;                //pointer to the head of the member list
groupl* subgroup;             //pointer to the head of the subgroup list
char* webpage;                //linke to the webpage

public:
	group(char* name) {
		this->number = atoi(db1->select("id","group",name));
		this->name = strdup(name);
		//more
		this->webpage = db1->select("webpage","group",name);
	}
void PrintAllUsers();
userl* Leader();
userl* Mod();
userl* Member();

char* Webpage();
bool IsInGroup(string who);
bool IsSubGroup(string who);
groupl* SubGroups();
void AddUser(user who);
void AddMod(user who);
void AddLead(user who);
};

class groupl              //a member of a group list
{
groupl* next;
group* Group;
};

class user
{
char* name;                 //the user's name... might like this to be in its own class later
char* password;             //the user's password. need a better mechanism for this
int userID;                 //for referenc purposes
groupl* groups;             //the list of groups the user is in

public:
char* Name();
};

class userl                 // a member of a user list
{
userl* next;
user* who;

public:
userl* Next();
user* Who();
};


//////////////////////////////////////////////////////////////
//////////This is the start of the functions from/////////////
//////////////////////the group class...//////////////////////
//////////////////////////////////////////////////////////////
userl* group::Leader()
{
   return leader;
}

userl* group::Mod()
{
   return mod;
}

userl* group::Member()
{
   return member;
}

void group::PrintAllUsers()
{
   userl* listptr = leader;
   user* who = NULL;
   char* name = NULL;
   cout << "Leaders: " << '\n';
   while(listptr != NULL)
   {
      who = (*listptr).Who();
      name = (*who).Name();
      printf("%s\n", name);
      listptr = (*listptr).Next();
   };

   listptr = mod;
   cout << '\n' << "Moderators: " << '\n';
   while(listptr != NULL)
   {
      who = (*listptr).Who();
      name = (*who).Name();
      printf("%s\n", name);
      listptr = (*listptr).Next();
   };

   listptr = member;
   cout << '\n' << "Members: " << '\n';
   while(listptr != NULL)
   {
      who = (*listptr).Who();
      name = (*who).Name();
      printf("%s\n", name);
      listptr = (*listptr).Next();
   };
}

/////////////////////userl methods////////////////////
userl* userl::Next()
{
   return next;
}

user* userl::Who()
{
   return who;
}

//////////////////////user methods///////////////////
char* user::Name()
{
   return name;
}

////////////////////not yet needed methods from various classes not in propper form//////////////
/*
char* Leader()
{
}

char* Webpage()
{
}

bool IsInGroup(char* who)
{
}

bool IsSubGroup(char* who)
{
}

groupl* SubGroups()
{
}

void AddUser(user who)
{
}

void AddMod(user who)
{
}

void AddLead(user who)
{
}
*/
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
