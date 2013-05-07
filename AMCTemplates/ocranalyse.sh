# Get the path to the pdf to be split

# Get the uniquename of the class/test

# Get the threshold to use 

# build the list file to use
rm /var/www/tmp/$2.list
touch /var/www/tmp/$2.list
echo $1 > /var/www/tmp/$2.list

# make a temporary project to work from
rm -r /var/www/tmp/baseg$2
mkdir /var/www/tmp/baseg$2
rm -r /var/www/tmp/baseg$2/mep
mkdir /var/www/tmp/baseg$2/mep
cp -r /var/www/AMCTemplates/baseg/* /var/www/tmp/baseg$2

# Split the pdf into TIFFs to be analysed
auto-multiple-choice getimages --use-pdftk --copy-to /var/www/tmp/baseg$2/scans --list /var/www/tmp/$2.list
# analyse
auto-multiple-choice analyse --multiple --tol-marque 0.2,0.2 --prop 0.8 --bw-threshold 0.5 --progression-id analyse --progression 1 --n-procs 0 --data /var/www/tmp/baseg$2/data --projet /var/www/tmp/baseg$2/ --cr /var/www/tmp/baseg$2/cr --list /var/www/tmp/$2.list --no-ignore-red --pre-allocate 1

# compute marks
auto-multiple-choice note --data /var/www/tmp/baseg$2/data --seuil $3

# export
auto-multiple-choice export --module CSV --data /var/www/tmp/baseg$2/data --sort n --fich-noms %PROJET/ --noms-encodage UTF-8 --no-rtl --output /var/www/tmp/baseg$2/exports/baseg$2.csv --option-out encodage=UTF-8 --option-out columns=student.copy,student.key,student.name --option-out decimal=, --option-out ticked=AB --option-out separateur=;

# echo the csv file second line

