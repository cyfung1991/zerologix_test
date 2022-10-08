import './css/app.scss';
import React, { useState, useEffect } from "react";
import {Heading} from './components/heading.js';
import {Webinars} from './components/webinars.js';
import {MeetYourHost} from './components/meet_your_host.js';
import {RegisterForm} from './components/register_form.js';
function App() {
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
