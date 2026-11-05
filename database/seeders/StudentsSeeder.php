<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'name' => 'Aarav Sharma',
                'email' => 'aarav.sharma@example.com',
                'phone' => '9876543210',
                'date_of_birth' => '2005-03-15',
                'gender' => 'male',
                'address' => '12 MG Road, Bengaluru, Karnataka',
            ],
            [
                'name' => 'Diya Patel',
                'email' => 'diya.patel@example.com',
                'phone' => '9876543211',
                'date_of_birth' => '2006-07-22',
                'gender' => 'female',
                'address' => '45 Nehru Street, Ahmedabad, Gujarat',
            ],
            [
                'name' => 'Rohan Verma',
                'email' => 'rohan.verma@example.com',
                'phone' => '9876543212',
                'date_of_birth' => '2004-11-08',
                'gender' => 'male',
                'address' => '78 Civil Lines, Delhi',
            ],
            [
                'name' => 'Ananya Iyer',
                'email' => 'ananya.iyer@example.com',
                'phone' => '9876543213',
                'date_of_birth' => '2005-01-30',
                'gender' => 'female',
                'address' => '23 Anna Nagar, Chennai, Tamil Nadu',
            ],
            [
                'name' => 'Kabir Khan',
                'email' => 'kabir.khan@example.com',
                'phone' => '9876543214',
                'date_of_birth' => '2006-05-19',
                'gender' => 'male',
                'address' => '56 Banjara Hills, Hyderabad, Telangana',
            ],
            [
                'name' => 'Ishita Roy',
                'email' => 'ishita.roy@example.com',
                'phone' => '9876543215',
                'date_of_birth' => '2004-09-12',
                'gender' => 'female',
                'address' => '89 Salt Lake, Kolkata, West Bengal',
            ],
            [
                'name' => 'Vivaan Gupta',
                'email' => 'vivaan.gupta@example.com',
                'phone' => '9876543216',
                'date_of_birth' => '2005-12-04',
                'gender' => 'male',
                'address' => '34 Lajpat Nagar, Delhi',
            ],
            [
                'name' => 'Meera Nair',
                'email' => 'meera.nair@example.com',
                'phone' => '9876543217',
                'date_of_birth' => '2006-02-27',
                'gender' => 'female',
                'address' => '67 Kochi, Kerala',
            ],
            [
                'name' => 'Arjun Mehta',
                'email' => 'arjun.mehta@example.com',
                'phone' => '9876543218',
                'date_of_birth' => '2004-06-16',
                'gender' => 'male',
                'address' => '11 Andheri West, Mumbai, Maharashtra',
            ],
            [
                'name' => 'Saanvi Reddy',
                'email' => 'saanvi.reddy@example.com',
                'phone' => '9876543219',
                'date_of_birth' => '2005-08-09',
                'gender' => 'female',
                'address' => '44 Gachibowli, Hyderabad, Telangana',
            ],
            [
                'name' => 'Aditya Singh',
                'email' => 'aditya.singh@example.com',
                'phone' => '9876543220',
                'date_of_birth' => '2006-10-01',
                'gender' => 'male',
                'address' => '22 Hazratganj, Lucknow, Uttar Pradesh',
            ],
            [
                'name' => 'Riya Joshi',
                'email' => 'riya.joshi@example.com',
                'phone' => '9876543221',
                'date_of_birth' => '2004-04-25',
                'gender' => 'female',
                'address' => '55 Vastrapur, Ahmedabad, Gujarat',
            ],
            [
                'name' => 'Karan Malhotra',
                'email' => 'karan.malhotra@example.com',
                'phone' => '9876543222',
                'date_of_birth' => '2005-11-14',
                'gender' => 'male',
                'address' => '33 Karol Bagh, Delhi',
            ],
            [
                'name' => 'Pooja Desai',
                'email' => 'pooja.desai@example.com',
                'phone' => '9876543223',
                'date_of_birth' => '2006-03-06',
                'gender' => 'female',
                'address' => '66 Surat, Gujarat',
            ],
            [
                'name' => 'Devansh Rao',
                'email' => 'devansh.rao@example.com',
                'phone' => '9876543224',
                'date_of_birth' => '2004-07-18',
                'gender' => 'male',
                'address' => '77 Jayanagar, Bengaluru, Karnataka',
            ],
            [
                'name' => 'Sneha Kulkarni',
                'email' => 'sneha.kulkarni@example.com',
                'phone' => '9876543225',
                'date_of_birth' => '2005-09-03',
                'gender' => 'female',
                'address' => '88 Pune, Maharashtra',
            ],
            [
                'name' => 'Rahul Chauhan',
                'email' => 'rahul.chauhan@example.com',
                'phone' => '9876543226',
                'date_of_birth' => '2006-01-21',
                'gender' => 'male',
                'address' => '99 Jaipur, Rajasthan',
            ],
            [
                'name' => 'Nisha Pillai',
                'email' => 'nisha.pillai@example.com',
                'phone' => '9876543227',
                'date_of_birth' => '2004-05-28',
                'gender' => 'female',
                'address' => '13 Thiruvananthapuram, Kerala',
            ],
            [
                'name' => 'Yash Agarwal',
                'email' => 'yash.agarwal@example.com',
                'phone' => '9876543228',
                'date_of_birth' => '2005-10-11',
                'gender' => 'male',
                'address' => '24 Noida, Uttar Pradesh',
            ],
            [
                'name' => 'Tanya Kapoor',
                'email' => 'tanya.kapoor@example.com',
                'phone' => '9876543229',
                'date_of_birth' => '2006-06-07',
                'gender' => 'female',
                'address' => '35 Chandigarh, Punjab',
            ],
            [
                'name' => 'Manav Bhatt',
                'email' => 'manav.bhatt@example.com',
                'phone' => '9876543230',
                'date_of_birth' => '2004-12-19',
                'gender' => 'male',
                'address' => '46 Vadodara, Gujarat',
            ],
            [
                'name' => 'Aisha Siddiqui',
                'email' => 'aisha.siddiqui@example.com',
                'phone' => '9876543231',
                'date_of_birth' => '2005-02-14',
                'gender' => 'female',
                'address' => '57 Bhopal, Madhya Pradesh',
            ],
            [
                'name' => 'Rahul Nair',
                'email' => 'rahul.nair@example.com',
                'phone' => '9876543232',
                'date_of_birth' => '2006-08-26',
                'gender' => 'male',
                'address' => '68 Kozhikode, Kerala',
            ],
            [
                'name' => 'Priya Chatterjee',
                'email' => 'priya.chatterjee@example.com',
                'phone' => '9876543233',
                'date_of_birth' => '2004-03-31',
                'gender' => 'female',
                'address' => '79 Howrah, West Bengal',
            ],
            [
                'name' => 'Vikram Rathore',
                'email' => 'vikram.rathore@example.com',
                'phone' => '9876543234',
                'date_of_birth' => '2005-07-13',
                'gender' => 'male',
                'address' => '80 Indore, Madhya Pradesh',
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}