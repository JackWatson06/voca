import React from 'react';

export const CompanyInput = (props) =>
{

    return (
        <>
            <div className="form-row">
                <div className="col">
                    <label htmlFor="company-form-name">Company Name:</label>
                    <input id="company-form-name" required type="text" className="form-control" name="name" defaultValue={this.props.data && this.props.company.name}/>
                </div>
                <div className="col">
                    <label htmlFor="company-form-industry">Industry:</label>
                    <select id="company-form-industry" required className="form-control" name="industry" defaultValue={this.props.data && this.props.company.industry}>
                        <option>Bell Hanger</option>
                        <option>Boilermaker</option>
                        <option>Carpenter</option>
                        <option>Carpet Layer</option>
                        <option>Dredger</option>
                        <option>Electrician</option>
                        <option>Elevator Mechanic</option>
                        <option>Fencer</option>
                        <option>Glazier</option>
                        <option>Heavy Equipment Operator</option>
                        <option>HVAC Technician</option>
                        <option>Insulation Installer</option>
                        <option>Ironworker</option>
                        <option>Laborer</option>
                        <option>Landscaper</option>
                        <option>Linemen</option>
                        <option>Mason</option>
                        <option>Millwright</option>
                        <option>Painter</option>
                        <option>Pile Driver</option>
                        <option>Pipefitter</option>
                        <option>Plasterer</option>
                        <option>Plumber</option>
                        <option>Roofer</option>
                        <option>Sheet Metal Worker</option>
                        <option>Sign Display Worker</option>
                        <option>Steak Fixer</option>
                        <option>Waterproofer</option>
                        <option>Welder</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div className="form-row">
                <div className="col">
                    <label htmlFor="company-form-size">Size (People):</label>
                    <input id="company-form-size" type="text" required className="form-control" name="size" defaultValue={this.props.data && this.props.company.size}/>
                </div>
                <div className="col">
                    <label htmlFor="company-form-info">Additional Info</label>
                    <textarea id="company-form-info" className="form-control" rows="3" name="info" defaultValue={this.props.data && this.props.company.info}></textarea>
                </div>
            </div>
            <div className="form-row text-center">
                <div className="col">
                    <button type="submit" className="btn btn-primary">Submit</button>
                </div>
            </div>
        </>
    );
}