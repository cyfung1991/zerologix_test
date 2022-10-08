import React, { Component } from 'react';
export class MeetYourHost extends Component {

  render() {
    return(
      <div id="meet_your_host_wrapper">
        <div className="title">
        Meet Your Host - Alistair Schultz
        </div>
        <div className="description">
            <p>With more than 15 years of experience covering both the FX and CFD markets, Alistair has extensive knowledge covering algorithmic trading, market analysis & an impressive educational background.</p>
            <p>As the author of ‘Essentials for Trading Students – An Overview of the Basics for Aspiring Traders’, which was released in 2017, Alistair will take any aspiring trader from the basics right through to advanced analytics used in institutional funds.</p>
            <p>At the core of Alistair’s teachings is the ability to help each trader uncover their ‘Trading DNA', helping them flourish with the skills and timeframes that work best for them.</p>
        </div>
        <div className="see_more">
            <div className="text">See more</div>
            <div className="icon"></div>
        </div>
        <div className="youtube_wrapper">
        <iframe
            src="https://www.youtube.com/embed/Tn6-PIqc4UM"
            frameBorder="0"
        />
        </div>
      </div>
    )
  }

}