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
| Name        									    | Return Value        |      
| ------------------------------------------------- |---------------------|
| `*base_url*/users/*user_id*`                      | `*integer*`         | 
| `*base_url*/artist/*Taylor%20Swift*`              | `*string*`          |
| `*base_url*/recommendation/*mood*/*username*`     | `*both string*`     |
| `*base_url*/discovery/*username*`					| `*string*`		  |
| `*base_url*/top/*username*`						| `*string*`          |
| `*base_url*/weekly_trend/*username*`				| `*string*`          |
| `*base_url*/user_data/*mood*/*username*`			| `*both string*`     |
| `*base_url*/song/*song_id*`						| `*integer*`         |
| `*base_url*/add_interactions/						| `key_val http body` |
