### Prerequirements:
* docker
* docker-compose

### Run:
`docker-compose up`

### Test:
#### UI
open in browser http://127.0.0.1:8000

#### CommandLine
##### * `ValuteID` required, `from` and `to` is optional

* All period
`curl 127.0.0.1:8000/v1/currencies/valute/R01717`

* From date `curl 127.0.0.1:8000/v1/currencies/valute/R01717?from=2022-04-22`

* To date `curl 127.0.0.1:8000/v1/currencies/valute/R01717?to=2022-04-24`

* From-To date `curl 127.0.0.1:8000/v1/currencies/valute/R01717?from=2022-04-22&to=2022-04-24`

##### Additionally, RestFull API for currency table:

* `GET /v1/currencies/` List of currencies 
* `GET /v1/currencies/<id>` Retrieve currency by id
* `POST /v1/currencies/` Create currency
* `PUT /v1/currencies/<id>` Update currency by id
* `PATCH /v1/currencies/<id>` Partial Update currency by id
* `DELETE /v1/currencies/<id>` Delete currency by id

### To check API, please import and run Postman collection via link 
https://www.getpostman.com/collections/1bcac375278e17d06de6
