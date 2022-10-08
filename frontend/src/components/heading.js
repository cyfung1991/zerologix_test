import React, { Component } from 'react';
export class Heading extends Component {

  render() {
    return(
      <div id="heading_wrapper">
        <div className="heading_bar">
          <div className="language">
            <select>
              <option>EN</option>
            </select>
            <div className="f1"></div>
            <button className="login">Login</button>
          </div>
          <div className="nav">
            <div className="logo"></div>
            <div className="f1"></div>
            <button className="logout">Logout</button>
          </div>
        </div>

        <div className="webinar_wrapper">
          <div className="title">
            Forex Webinars
          </div>
          <div className="description">
            Whether you are new to foreign exchange trading or already have some market experience, we believe that a solid FX trading education is vital to your success as a trader.
          </div>
        </div>
      </div>
    )
  }

}