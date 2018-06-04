# ethereum_web_wallet_generator
This code was written to generate an Ethereum wallet, the public key is sent to a database and the private key remains on the clients device for download, the private key is not shared server side.

# Required
- Docker
- PHP5.6+
- [wtfcmd](https://wtf.blunt.sh)

# Installation

- Start a mysql server with `wtf db-start`,
- Install the sample.sql inside the `test` database (localhost:133306, root:bluntAndSnakesR1337),
- Start the local php server with `wtf serve`
