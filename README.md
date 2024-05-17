## Requirements

- PHP >= 8.1

## Installation

- Clone the repo and `cd` into it
- Run `composer update`
- Rename or copy `.env.example` file to `.env`
- Set your database credentials in your `.env` file
- And then migrate the database `php artisan migrate`
- Then migrate the seeders `php artisan migrate:fresh --seed`

## The account 

3 role of the application. <br><br>

1. Admin (to assign aggrement to superior on division, see statistic of vehicles borrow user in month, export dataset vehicles users, entry data vehicles new and status vehicles) <br>
`email : admin@gmail.com` <br>
`password : password` <br><br>

2. Pegawai (to request the borrow of vehicles office) <br>
`email : pegawai@gmail.com` <br>
`password : password`<br><br>
`email : pegawai2@gmail.com`<br>
`password : password`<br><br>

3. Superior (to accept request aggrement pegawai, see data statistic users borrow vehicles) <br>
`email : superior@gmail.com` <br>
`password : password` <br><br>
`email : superior2@gmail.com` <br>
`password : password` <br><br>

## Preview

### user process request vehicles

1. user login
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/e5cee28f-bb79-46ad-8b3f-9aaba380399f)

2. user can see the type vehicles all and count all vehicles (he can assign request to borrow the vehicles in click button `eye` in the action column
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/6f86d86b-2f2e-4f08-ad90-7efebaf02b26)

3. next step, pegawai select the vehicles needed to borrow. for example in this page, the vehicle licence number `A 1234 ABC` dont have to borrow because the status vehicles is `Borrowed`, so pegawai can borrow the others
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/65e0823f-541a-48fc-92df-096985c225db)

4. after click the button, pegawai must be fill in the date borrow, end date borrow, and notes borrow. and the submitted
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/ae4d74b6-3084-4de7-9fe9-05ff145a0d61)

5. finish assign request borrow
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/f06e7160-c1f1-4bb7-a1ab-db13adc6e465)

6. pegawai can see the progres status in page History Approval Vehicle
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/d94659f1-a199-4b8a-985d-e3a341ebb138)

<br>* first time the status is pending


### admin proses 

1. login
2. page redirect in the statistic of the borrows vehicles on month
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/b656a088-6a87-4c9e-ab4b-02d7a8430792)
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/3c899951-8994-4453-b934-c2bef39ff5dd)

3. admin fitur is add, edit, and delete vehicles
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/600b2e5f-d8c1-4d8d-915d-1414034e3605)

4. page add vehicles type
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/d5a72855-0532-44aa-bfe7-43ebe6e2ce38)
*3 type the vehicles : mobil sewa, mobil angkutan barang, mobil angkutan orang

edit : 
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/1022219a-14c9-4d36-a357-8767b78200d5)

delete : 
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/c0766aae-7cd6-4c2d-8b46-4a763afe66e7)

5. and the admin can assign new of the vehicles count and licence number, can edit and delete the data vehicles
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/aa0da3b1-aea9-4c4a-a3b0-3f1d90efa873)

6. and admin can se the history of pegawai in succesfully accept the borrows
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/5f7a6879-1449-490f-8e2e-2655c701376a)

7. admin can see all of the request pegawai approval
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/605cd900-7f64-44cf-b76a-7d3bc37af0b2)

8. can entry approval to assign in `superior acc`, export the data all in excel
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/fd3fd206-2958-4afc-a4a8-407c9067b9a2)

excel : 
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/6473320c-ef76-45d5-85ca-8299a781ec10)


#### attention next step approval pegawai 
1. admin entry the approval in column `entry approval `
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/7007ba95-4fd6-498a-89b0-7e5ec86850cd)

2. example : in pegawai step before, the name pegawai request is Pegawai1, the status is pending. in this case, admin must assign the acc in the superior in divisi. so can update the status and assign approval to superior and sign the drivers
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/6ccadba0-3cb7-4414-a369-dc3a228cc64d)
* in this case, admin assign acc in the superior1 and assign driver in susi

3. and then the status can be change if the superior editted
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/25c8e98f-d180-4cc3-9899-3c117a666206)

so in this case, next step in superior


### superior proces
1. supperior page
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/256a7240-60d9-4dba-81a6-e92564abca3b)

2. supperior can assign update the approval
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/35e4a23d-cb50-4c2e-94d3-7a6dc6a05ad1)

3. if acc, can be assign `Approved`

5. superior success update status
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/295e409f-0b40-4c26-b8c6-b65e93386331)

6. the status changes
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/6622778a-8330-4590-a845-d9e5f10a78d1)

*in the admin and pegawai, must changes. and then pegawai can borrow the vehicle

### next step proces pegawai 

1. changes status
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/3832e222-5199-43d9-a3ce-b26f20206507)

2. update, pegawai other can't be borrow again because already acc
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/22f764d5-4389-499d-b8cf-7a7a7aec276a)

### the admin page 
1. history is update 
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/0c4d6bb3-1c40-47fb-ba53-5d26850718dc)


### the DBMS
![image](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/1afbccf4-13ea-4540-bb33-5e9a52008965)

### the activity diagram 
![activity diagram (1)](https://github.com/gedehariyogananda/repo-sekawan-media-task/assets/123063394/610e06ed-2ea9-4d70-b4f9-b625488f1532)


### credit 
the template admin : https://github.com/aleckrh/laravel-sb-admin-2


# thanks 😁

