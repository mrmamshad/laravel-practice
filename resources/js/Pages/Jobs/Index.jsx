import React, { useState } from "react";
import { Head } from "@inertiajs/react";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import TablePagination from '@mui/material/TablePagination';

export default function Jobs({ jobs, auth }) {
    const [page, setPage] = useState(0);
    const [rowsPerPage, setRowsPerPage] = useState(5);

    const handleChangePage = (event, newPage) => {
        setPage(newPage);
    };

    const handleChangeRowsPerPage = (event) => {
        setRowsPerPage(parseInt(event.target.value, 10));
        setPage(0);
    };

    // Calculate the jobs to display on the current page
    const displayedJobs = jobs.slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage);

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Jobs
                </h2>
            }
        >
            <Head title="All Jobs" />

            <div className="space-y-4 mt-5 mx-10 rounded-xl dark:text-white">
                {displayedJobs.map((job) => (
                    <a
                        href={`/jobs/${job.id}`}
                        className="block px-4 py-6 border border-gray-600 rounded-lg"
                        key={job.id}
                    >
                        <div className="font-bold text-blue-500 text-sm">
                            {job.employer.name}
                        </div>
                        <div>
                            <strong>{job.title}:</strong> Pays {job.salary} per year.
                        </div>
                    </a>
                ))}
            </div>

            <TablePagination
                component="div"
                count={jobs.length}
                page={page}
                onPageChange={handleChangePage}
                rowsPerPage={rowsPerPage}
                onRowsPerPageChange={handleChangeRowsPerPage}
                rowsPerPageOptions={[5, 10, 20,30,100]}
            />
        </AuthenticatedLayout>
    );
}
