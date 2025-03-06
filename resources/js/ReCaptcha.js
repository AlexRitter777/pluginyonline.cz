

    export function reCaptcha(){

        const publicKey = "6LflMpQgAAAAAMN2q092nkMkkOCUicv4D60lxZc9";

        return new Promise((resolve, reject) =>{

            grecaptcha.ready(() => {

                grecaptcha.execute(publicKey, {action: 'submit'}).then((token) => {

                    resolve(token);

                })


            })

        })


    }



