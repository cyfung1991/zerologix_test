import './css/app.scss';
import React from "react";
import {Heading} from './components/heading.js';
import {Webinars} from './components/webinars.js';
import {MeetYourHost} from './components/meet_your_host.js';
import {RegisterForm} from './components/register_form.js';
import axios from 'axios';

function App() {
  // const [data, setData] = React.useState([]);
  // React.useEffect(() => {
  //   axios
  //     .get("http://g1api.finlogix.com/v1/api/post/analysis?per_page=12&page=1")
  //     .then((res) => {
  //       setData(res.data)
  //     })
  // })
  return (
    <div className="App">
      <Heading />
      <Webinars />
      <MeetYourHost />
      <RegisterForm />
    </div>
  );
}

export default App;
