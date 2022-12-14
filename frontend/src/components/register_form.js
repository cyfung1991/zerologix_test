import React, { Component } from 'react';
export class RegisterForm extends Component {
    render() {
        return (
            <div id="register_form_wrapper">
                <div className="form_wrapper">
                    <div className="title">
                        Register for a Webinar now
                    </div>
                    <div className="description">
                        Please fill in the form below and you will be contacted within 1 working day by our professional business experts.
                    </div>

                    <form onSubmit={this.formSubmit}>
                        <div className="form_group">
                            <label>Topic</label>
                            <input />
                            <small></small>
                        </div>
                        <div className="form_group">
                            <label>First Name</label>
                            <input type="text" name="first_name" />
                            <small></small>
                        </div>
                        <div className="form_group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" />
                            <small></small>
                        </div>
                        <div className="form_group">
                            <label>Email</label>
                            <input type="email" name="email" />
                            <small></small>
                        </div>
                        <div className="form_group">
                            <label>Phone</label>
                            <div className="split_input">
                                <select name="country_code">
                                    <option value="61">+61</option>
                                    <option value="62">+62</option>
                                    <option value="63">+63</option>
                                </select>
                                <input type="number" />
                            </div>
                            <small></small>
                        </div>
                        <div className="form_group">
                            <label>Mobile Authentication</label>
                            <div className="split_input">
                                <input type="text" defaultValue="Get" />
                                <input type="number" />
                            </div>
                            <small></small>
                        </div>
                        <div className="form_group">
                            <input type="submit" value="Register" />
                        </div>
                    </form>

                </div>

            </div>
        )
    }

}