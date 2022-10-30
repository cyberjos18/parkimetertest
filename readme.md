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
         covermanagertest/database/backup
You can have access to database sql script for restore the database with information      
## Link Site
The URL for use this site is **http://127.0.0.1/covermanagertest/public/**

## Api functionality

- **[createtable | POST](#)| /api/tables/createtable**
##### Create tables in database, for this is neccesary this attributes:
    - identificator => identificator number per table | Type: INT.
    - cap_min       => Minimum capacity per table | Type: INT.
    - cap_max       => Maximun capacity per table | Type: INT.  
.
.
.
For create a POST the estructure must be like it:

    "identificator":int,
    "cap_min":int,
    "cap_max":int

If exist a error in validation this return 422 code:

    "errors": {
        "attribute": [
            "message"
        ]
    }

If result is ok this return a 200 code:

    "status": ok

- **[deletetable | DELETE](#)| /api/tables/deletetable/{identificator}**
##### Delete tables in database, for this is neccesary this attributes:
    - identificator => identificator number per table | Type: INT.
.
.
.
For create a DELETE the estructure must be like it:

    "identificator":int,
    

If exist a error in validation this return 422:

    "errors": {
        "attribute": [
            "message"
        ]
    }

If result is ok this return a 200 OK:

    "status": ok


- **[createreservation | POST](#)| /api/reservations/createreservation**
##### Create reservations in database, for this is neccesary this attributes:
    - identificator => identificator number per table | Type: INT.
    - client_name   => The name of the client | Type: VARCHAR(25).
    - persons       => Persons in a table | Type: INT.
    - reserve_date  => Date of the reserve | Type: DATE (DD-MM-YYYY) 
.
.
.
For create a POST the estructure must be like it:

    "identificator":int,
    "client_name":varchar(25),
    "persons":int,
    "reserve_date": date

If exist a error in validation this return 422 code:

    "errors": {
        "attribute": [
            "message"
        ]
    }

If result is ok this return a 200 code and reserve number:

    "status": "ok",
        "information_reserve": {
            "reserve_number": "number of reserve"
        }
        
- **[checktablesreservation | GET](#)| /api/reservations/checktablesreservation/{reserve_date}/{persons}**
##### Verificate available tables according date of reserve and persons in table, for this is neccesary this attributes:
    - reserve_date  => Date of the reserve | Type: DATE (DD-MM-YYYY)
    - persons       => Persons in a table | Type: INT.
.
.
. 
For create a GET the estructure must be like it:

    "reserve_date": date    
    "persons":int,

If exist a error in validation this return 422 code:

    "errors": {
        "attribute": [
            "message"
        ]
    }

If result is ok this return a 200 code:

    "status": "ok",
        "available_tables": [
            {
                "identificator": int,
                "cap_min": int,
                "cap_max": int
            },

NOTE: The available tables are tables that NOT have reserve in the request date  

- **[deletereservation | DELETE](#)| /api/reservations/deletereservation/{reserve_number}**
##### Delete reservations in database for this is neccesary this attributes:

    - reserve_number => identificator number per table | Type: VARCHAR(25).
.
.
.
For create a DELETE the estructure must be like it:

    "reserve_number":varchar,
    

If exist a error in validation this return 422:

    "errors": {
        "attribute": [
            "message"
        ]
    }

If result is ok this return a 200 OK:

    "status": ok      