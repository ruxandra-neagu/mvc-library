<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
       $books = [
    [
        'title' => 'Atomic Habits',
        'author' => 'James Clear',
        'publisher' => 'Trei',
        'category' => 'Dezvoltare personală',
        'price' => 65.00,
        'image' => 'Atomic-Habits.png',
        'stock' => 10,
        'description' => 'Atomic Habits oferă un cadru dovedit pentru îmbunătățirea cu 1% în fiecare zi. James Clear, unul dintre cei mai importanți experți în formarea obiceiurilor, dezvăluie strategii practice care te vor învăța cum să formezi obiceiuri bune, să le elimini pe cele rele și să stăpânești micile comportamente care duc la rezultate remarcabile.',
    ],
    [
        'title' => 'Dezumanizat',
        'author' => 'Osamu Dazai',
        'publisher' => 'Alice Books',
        'category' => 'Clasici',
        'price' => 44.95,
        'image' => 'Dezumanizat.jpeg',
        'stock' => 10,
        'description' => 'Dezumanizat este capodopera lui Osamu Dazai, o mărturisire sfâșietoare a unui om incapabil să se integreze în societate. Prin ochii lui Yozo Oba, autorul explorează alienarea, rușinea și căutarea identității într-o lume ostilă.',
    ],
    [
        'title' => 'Totul începe cu noi',
        'author' => 'Colleen Hoover',
        'publisher' => 'Epica',
        'category' => 'Romanță',
        'price' => 56.90,
        'image' => 'Totul-incepe-cu-noi.jpg',
        'stock' => 10,
        'description' => 'O poveste de dragoste emoționantă despre Lily Bloom, care se confruntă cu o relație dificilă și redescoperă iubirea adevărată. Colleen Hoover abordează cu sensibilitate teme precum violența domestică, sacrificiul și puterea de a lua decizii grele.',
    ],
    [
        'title' => 'Theodoros',
        'author' => 'Mircea Cărtărescu',
        'publisher' => 'Humanitas',
        'category' => 'Literatură română',
        'price' => 99.00,
        'image' => 'Theodoros.jpg',
        'stock' => 10,
        'description' => 'Theodoros este cel mai recent roman al lui Mircea Cărtărescu, o călătorie fascinantă în Bizanțul secolului al XV-lea. O carte despre identitate, destin și misterele existenței, scrisă în proza poetică inconfundabilă a autorului.',
    ],
    [
        'title' => 'Nostalgia',
        'author' => 'Mircea Cărtărescu',
        'publisher' => 'Humanitas',
        'category' => 'Literatură română',
        'price' => 59.90,
        'image' => 'Nostalgia.jpg',
        'stock' => 10,
        'description' => 'Nostalgia este volumul de debut al lui Mircea Cărtărescu, o colecție de proze poetice care a revoluționat literatura română. Prin vise, amintiri și viziuni suprarealiste, autorul construiește o lume unică, suspendată între realitate și fantezie.',
    ],
    [
        'title' => 'Fără țipete',
        'author' => 'Hal Runkel',
        'publisher' => 'Bookzone',
        'category' => 'Parenting',
        'price' => 59.90,
        'image' => 'Fara-tipete.jpg',
        'stock' => 10,
        'description' => 'Hal Runkel prezintă o abordare revoluționară a parentingului bazată pe auto-control. Cartea îi ajută pe părinți să renunțe la țipete și să construiască relații mai sănătoase cu copiii lor prin comunicare calmă și empatie.',
    ],
    [
        'title' => 'Asta înseamnă marketing',
        'author' => 'Seth Godin',
        'publisher' => 'Publica',
        'category' => 'Business',
        'price' => 59.00,
        'image' => 'Asta-inseamna-marketing.jpg',
        'stock' => 10,
        'description' => 'Seth Godin redefinește marketingul modern: nu e vorba de spam sau reclame agresive, ci de a găsi oamenii potriviți și a le oferi valoare reală. O carte esențială pentru orice antreprenor sau marketer care vrea să facă diferența.',
    ],
    [
        'title' => 'Tată bogat, tată sărac',
        'author' => 'Robert Kiyosaki',
        'publisher' => 'Curtea Veche',
        'category' => 'Business',
        'price' => 50.00,
        'image' => 'Tata-bogat-tata-sarac.jpg',
        'stock' => 10,
        'description' => 'Cea mai vândută carte despre finanțe personale din toate timpurile. Robert Kiyosaki explică diferența dintre cum gândesc bogații și săracii despre bani, investiții și libertatea financiară, oferind lecții valoroase pentru orice vârstă.',
    ],
    [
        'title' => 'Crimă și pedeapsă',
        'author' => 'F.M. Dostoievski',
        'publisher' => 'Gramar',
        'category' => 'Clasici',
        'price' => 55.00,
        'image' => 'Crima-si-pedeapsa.jpg',
        'stock' => 10,
        'description' => 'Capodopera lui Dostoievski urmărește zbuciumul interior al lui Raskolnikov, un student sărac care comite o crimă și se confruntă cu vinovăția și consecințele morale ale faptei sale. O explorare profundă a psihologiei umane și a conștiinței.',
    ],
    [
        'title' => 'Idiotul',
        'author' => 'F.M. Dostoievski',
        'publisher' => 'Polirom',
        'category' => 'Clasici',
        'price' => 69.00,
        'image' => 'Idiotul.jpg',
        'stock' => 10,
        'description' => 'Prințul Mîșkin, un om pur și bun la suflet, se întoarce în societatea rusă și se confruntă cu ipocrizia, lăcomia și pasiunile distructive ale celor din jur. Dostoievski creează portretul unui om cu adevărat bun într-o lume coruptă.',
    ],
    [
        'title' => 'Psihologia banilor',
        'author' => 'Morgan Housel',
        'publisher' => 'ACT și Politon',
        'category' => 'Business',
        'price' => 49.00,
        'image' => 'Psihologia-banilor.jpg',
        'stock' => 10,
        'description' => 'Morgan Housel explorează modul în care comportamentul și emoțiile noastre influențează deciziile financiare. Prin 19 povești captivante, cartea explică de ce succesul financiar nu ține doar de cunoștințe, ci și de cum gândim despre bani.',
    ],
];

// Sterge datele vechi si reinserteaza
\App\Models\Book::truncate();

foreach ($books as $book) {
    Book::create($book);
}

        foreach ($books as $book) {
            Book::create(array_merge($book, ['stock' => 10]));
        }
    }
}