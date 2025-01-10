class Fnumber;
class Number {
int num;
public:
Number(int num) {
cout << "constructor called\n";
this->num = num;
}
Operator Fnumber();
operator int() {
cout << "conversion function called\n";
return num;
}
int get_num() {
return num;
}
friend ostream &operator<<(ostream &strm, Number &n);
};
ostream &operator<<(ostream &strm, Number &n) {
strm << "num is: " << n.num;
return strm;
}
class Fnumber {
float fnum;
public:
Fnumber(float fnum) {
cout << "Fnum constructor called\n";
this->fnum = fnum;
}
Fnumber(Number n) {
cout << "Fnum constructor 2 called\n";
this->fnum = n.get_num();
}
operator Number() {
cout << "conversion function 2 called\n";
return Number(int(fnum));
}
friend ostream &operator<<(ostream &strm, Fnumber &fn);
};
ostream &operator<<(ostream &strm, Fnumber &fn) {
strm << "num is: " << fn.fnum;
return strm;
}
Number:: operator Fnumber(){ 
cout << "Conversion function from Number is called" ;
return Fnumber(float(num));
}
int main() {
Number n = 10;
cout << n << endl;;
Fnumber fn = 7.7f;
cout << fn << endl;
n = fn;
cout << n << endl;
fn = n;
cout << fn << endl;
return 0;
}