#include<iostream>
#include<cstring>
using std::cout;
using std::endl;
class Str
{
 int len;
 char *strng;
public:
 void print()
 {
 cout << len << ": ";
 puts(strng);
 }
 Str(const char *strng)
 {
 len = strlen(strng);
 this->strng = new char[len + 1];
 strcpy(this->strng, strng);
 cout << "constructor: " << strng << endl;
 }
 ~Str()
 {
 cout << "Destructor: " << strng << endl;
 delete strng;
 }
};
void fun(Str &ln)
{
 ln.print();
 cout << "Before deleting dynamic object\n";
 delete &ln;
 cout << "After deleting dynamic object\n";
}
int main()
{
 Str first_name("Jalaj");
 const Str middle_name("Pandavkumar");
 Str *last_name = new Str("Patel");
 first_name.print();
 // error: passing ‘const Test’ as ‘this’
 // argument discards qualifiers
 // const obj can't call non-const method
//  middle_name.print();
 fun(*last_name);
 last_name->print();
 return 0;
}