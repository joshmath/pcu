
//----------------------------------------------------------------------------------
//
// This is the ajax to submit a form to Hubspot
//
// More info here: https://developers.hubspot.com/docs/methods/forms/submit_form_v3
//
//----------------------------------------------------------------------------------

function submitToHubspot(e) {

    e.preventDefault();

    // ***** REQUIRED VARIABLES
    const hubspotPortalId = '';     // ex: 58903
    const hubspotFormGUID = '';     // ex: fcc69886-915b-4fef-b35f-27850ef461e1
    const hubspotFormClass = '';    // ex: contact-form
    const hubspotReturnClass = '';  // ex: contact-form-thank-you

    // json object: format with hubspot field name : your form field value
    let hubspotData = {
      firstName: document.querySelector('#first_name').value  ,
      lastName: document.querySelector('#last_name').value
    };

    // ***** END REQUIRED VARIABLES

    const axios = require('axios');

    let hubspotFormEndpoint = `https://api.hsforms.com/submissions/v3/integration/submit/${hubspotPortalId}/${hubspotFormGUID}`;
    let hubspotForm = document.querySelector(`.${hubspotFormClass}`);
    let hubspotReturn = document.querySelector(`.${hubspotReturnClass}`);


    // Send a POST request
    axios({
        method: 'post',
        url: hubspotFormEndpoint,
        data: hubspotData,
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function (response) {
        hubspotReturn.style.display = 'block';
        hubspotForm.style.display = 'none';
    });

}

/*=============================================
=            VUE Stuff            =
=============================================*/
import { gsap } from "gsap";

// Vue
window.Vue = require("vue");

// Event Bus
window.Event = new Vue();

const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
        .split("/")
        .pop()
        .split(".")[0],
        files(key).default
    )
);

new Vue({}).$mount("#app");

