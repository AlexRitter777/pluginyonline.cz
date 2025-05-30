import axios from "axios";

export default function slugManager()
{

    console.log('OK')
    return {

        async generateSlug(){
            console.log('Slug generator working...');

            const title = document.getElementById('title').value;

            if(!title){
                console.error('No title for slug!')
            }

            try{

                let response = await axios.post('/rw-admin/slug-generator', title);

                console.log(response);

            }catch (e){
                console.error(e);
            }
        }



    }



}
