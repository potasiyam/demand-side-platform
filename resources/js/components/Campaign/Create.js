import React, { Component } from 'react';

class Create extends Component {
    constructor(props) {
        super(props);
        this.state = {  }
    }
    render() {
        return (
            <form>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Name</label>
                    <input type="text" className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Start Date</label>
                    <input type="date" className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">End Date</label>
                    <input type="date" className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Total Budget</label>
                    <input type="number" className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Daily Budget</label>
                    <input type="number" className="form-control" required/>
                </div>
                <div className="form-group">
                    <label htmlFor="exampleInputEmail1">Creatives</label>
                    <div className="row mb-3">
                        <div className="col-11">
                            <input type="file" className="form-control" required/>
                        </div>
                        <div className="col-1">
                            <button className="btn btn-sm rounded-0 btn-outline-danger">Remove</button>
                        </div>
                    </div>
                    <input type="file" className="form-control" required/>
                </div>
                <button type="submit" className="btn btn-primary rounded-0 mt-2">Submit</button>
            </form>
        );
    }
}

export default Create;
