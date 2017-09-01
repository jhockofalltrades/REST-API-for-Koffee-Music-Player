# REST-API-for-Koffee-Music-Player
A REST API prototype for Koffee Music Player

## Operations
+ GET
**User information**   

**Information by artist**   

**Recommendations**   

**Discover songs**   

**Top songs**   

**Weekly trend of interactions**   

**All Data**   


+ DELETE
**Delete a song**   


+ PUT 
**Add new airplay**   

## Methods
| Name        									      | Return Value          | Description                              
| ----------------------------------------------------|-----------------------|--------------------------------------------
| ` *base_url*/users/*user_id* `                      | ` *integer* `         | **user_id** - must be existing user id.
| ` *base_url*/artist/*Taylor%20Swift* `              | ` *string* `          | **artist** - must be existing artist.
| ` *base_url*/recommendation/*mood*/*username* `     | ` *both string* `     | **mood + username** - moods are pre-defined and must exist. [See docs.](https://github.com/1jhock/Koffee-A-Web-based-Personal-Music-Player) 
| ` *base_url*/discovery/*username* `				  | ` *string* `		  | **username** - existing username.
| ` *base_url*/top/*username* `						  | ` *string* `          | **username** - existing username.
| ` *base_url*/weekly_trend/*username* `		      | ` *string* `          | **username** - existing username.
| ` *base_url*/user_data/*mood*/*username* `		  | ` *both string* `     | **mood + username** - moods are pre-defined and must exist.
| ` *base_url*/song/*song_id* `						  | ` *integer* `         | **song_id** - must be existing song id.
| ` *base_url*/add_interactions/ `					  | ` key_val http body ` | Must be `x-www-form-urlencoded`
