# Property-Rental-Database
In cooperation with the City of Kingston, I will keep track of rental properties, owners and students interested in renting properties.
Your database will store information as outlined below:

-   Rental properties are classified as "house", "apartment" or "room".  All rental properties have an address (street, city, province and postal code and apartment number (if applicable)), 
    number of bedrooms, number of bathrooms, parking (yes or no) and an indication of whether there is ensuite laundry or shared laundry.  The date of the property listing will be stored. We 
    will also note whether or not the rental property is accessible. The cost per month will also be stored.  In our database, each rental property will have a unique integer ID.
-   For houses, we store whether or not there is a fenced yard and whether the house is detached or a semi (attached to another house). 
-   For apartments we will indicate what floor the apartment is on, and whether or not there is an elevator in the building.
-   For rooms, we will indicate how many others will be living in the shared space and whether or not kitchen privileges are provided (yes or no).  Rooms often come furnished.  We will keep 
    track of the list of furnishings each room has (for instance, a bed, a desk, a lamp, a chair etc).
-   All people in our database will be assigned a unique identifier which consists of two letters and 3 numbers -- for example "CR123".
-   All rental properties have an owner associate with them.  Owners may own many properties and each property may be owned by more than one person.  Each owner has a first and last name and a 
    (unique) phone number.
-   We store renter's first and last name and  phone number.  All the renters in this database are students. We store their student ID, their expected year of graduation and their program of 
    study.  
-   Since students are often searching for properties together, our database will consist of the notion of "rental group" consisting of one or more students.  Each rental group will be 
    identified by a 4 digit code such as 0432 or 4893.  All renters belong to one and only one group. 
-   Groups of renters are looking for properties with a preferred set of characteristics - type of accommodation (house, apartment, room), # bedrooms, #bathrooms, parking, laundry, max they wish 
    to pay and accessibility.  We will assume that they are interested in only one type of accommodation (house, apartment or room).  Renters may or may not specify their preferences but if they 
    have specified their preferences, these will be stored.
-   Some properties, in addition to the owner, may have a property manager.  We store the property manager's first and last name and a unique phone number.  All property managers manage at least 
    one property but they may manage many.  We keep track of the year that they started managing each property.
-   Once a rental agreement has been signed by a group of renters for a particular property we will note the date that the lease was signed as well as the end date of the lease as well as the 
    total monthly rent for the property.  Of course, we keep track of who is renting which property.
