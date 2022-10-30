## This is a site use the Laravel Framework 5.8 how API engine
##### Is important for beging you need:
    - php: 7.2.* (Minimum)
    - composer: 2.* (recommend)
    - MariaDB 10.3 (Minimum)

##### After please execute:
      \>: composer update

## About Database
##### In this directory
         parkimetertest/database/model
You can have access to database diagram
##### In this directory
         parkimetertest/database/backup
You can have access to database sql script for restore the database with information      
## Link Site
The URL for use this site is **http://127.0.0.1/parkimetertest/public/**

## Api functionality

- **[ create booking | POST](#)| /api/bookings**
##### Create booking in database, for this is neccesary this attributes:
    - reserveId                   => ID of reserve | Type: VARCHAR(15)
    - date_beging_reservation     => Date of beging booking | Type: DATATIME (DD-MM-YYYY H:i:s)
    - date_beging_reservation     => Date of ending booking | Type: DATATIME (DD-MM-YYYY H:i:s)
    - parking_id                  => ID of parking neccesary for the booking | Type: INT 
    - vehicle_registration_number => number of the registration of the vehicle | Type: VARCHAR(15)
.
.
.
For create a POST the estructure must be like it:

    "reserveId" : VARCHAR(15)
    "date_beging_reservation" : DATATIME (DD-MM-YYYY H:i:s)
    "date_beging_reservation" : DATATIME (DD-MM-YYYY H:i:s)
    "parking_id" : INT 
    "vehicle_registration_number"  : VARCHAR(15)
    .

If exist a error in validation this return 422 code:

    "errors": { 
       "message"
    }

If result is ok this return a 200 code and reserve number:

    "status": "ok"
        
        
- **[ booking list | GET](#)| /api/bookings/{reserveId}**
##### Verificate booking reserve according reserve ID, for this is neccesary this attributes:
    - reserveId  => ID of the reserve | Type: VARCHAR(15)    
.
.
. 
For create a GET the estructure must be like it:

    "reserveId": VARCHAR(15)        

If exist a error in validation this return 422 code:

    "errors": {       
            "message"       
    }

If result is ok this return a 200 code:

    "status": "ok",
        "bookingresult": [
            {
                "reserveId": VARCHAR(15),
                "date_beging_reservation": DATETIME (DD-MM-YYYY H:i:s),
                "date_ending_reservation": DATETIME (DD-MM-YYYY H:i:s),
                "parking_id": INT,
                "vehicle_registration_number": VARCHAR(15)
            },

 